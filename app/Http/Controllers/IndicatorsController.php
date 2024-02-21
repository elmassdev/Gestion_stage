<?php

namespace App\Http\Controllers;


use App\Models\Stagiaire;
use App\Models\Holiday;
use App\Models\Ville;
use App\Models\Etablissement;
use App\Models\Encadrant;
use App\Models\Filiere;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Exports\StagiaireTypeFormationExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;




Paginator::useBootstrap();

class IndicatorsController extends Controller
{

    public function index(Request $request)
    {
        $tday =Carbon::today();
        $paginatedstagiaires = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, services.sigle_service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('services.sigle_service')
            ->orderBy('total','desc')->paginate(5);
            $stagiaires = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, services.sigle_service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('services.sigle_service')
            ->orderBy('total','desc')->get();


        $paginatedstagenc = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('nomenc')
            ->orderBy('total','desc')->paginate(6);
            $stagenc = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('nomenc')
            ->orderBy('total','desc')->get();


        $query = $request->input('search');
        $results = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
            ->where('date_debut', '=', $query)->where('stagiaires.annule', '=', false)
            ->orderBy('code', 'desc')
            ->paginate(20);

        $statoday = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', Auth::user()->site)
        ->select(DB::raw('stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
        ->whereRaw('date_debut >= NOW()')
        ->where('stagiaires.annule', '=', false)->paginate(4);

        $monthlysta = Stagiaire::select(DB::raw('COUNT(*) as total'), DB::raw('MONTH(date_debut) as mois'), DB::raw('YEAR(date_debut) as annee'))
            ->whereRaw('date_debut >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->groupBy(DB::raw('YEAR(date_debut)'), DB::raw('MONTH(date_debut)'))
            ->orderBy('annee', 'asc')
            ->orderBy('mois', 'asc')
            ->get();

        return view('indicators.index',compact('stagiaires','stagenc','paginatedstagiaires','paginatedstagenc','statoday','results','monthlysta'));
    }


    public function ExcelStaSer()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', "Service d'accueil");
        $sheet->setCellValue('B1', 'total');

        $tday = Carbon::today()->format('d-m-Y');
        $data = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->select(DB::raw('count(*) as total, services.sigle_service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('services.sigle_service')
            ->orderBy('total','desc')
            ->get();

        // Add data to the sheet
        foreach ($data as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->sigle_service);
            $sheet->setCellValue('B' . ($row + 2), $rowData->total);
        }

        // Set the response headers for Excel file download
        $filename = 'Bilan_stagiaires_en_cours_par-service_'.$tday.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }


    public function ExcelStaEnc()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', "Encadrant");
        $sheet->setCellValue('B1', 'Nombre de stagiaires');
        $today = Carbon::today()->format('d-m-Y');
        $data = DB::table('stagiaires')->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->groupBy('nomenc')
            ->orderBy('total','desc')
            ->get();

        // Add data to the sheet
        foreach ($data as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->nomenc);
            $sheet->setCellValue('B' . ($row + 2), $rowData->total);
        }

        // Set the response headers for Excel file download
        $filename = 'Bilan_stagiaires_en_cours_par-Encadrant_'.$today.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Create a writer and save the file to the output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
    public function ListeCurrentSta()
    {
        $today = Carbon::today()->format('d-m-Y');
        $site = Auth::user()->site;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', "Titre");
        $sheet->setCellValue('B1', 'nom');
        $sheet->setCellValue('C1', 'prénom');
        $sheet->setCellValue('D1', 'CIN');
        $sheet->setCellValue('E1', 'niveau');
        $sheet->setCellValue('F1', 'diplome');
        $sheet->setCellValue('G1', 'Ecole');
        $sheet->setCellValue('H1', 'Type de stage');
        $sheet->setCellValue('I1', 'Encadrant');
        $sheet->setCellValue('J1', 'Service');
        $sheet->setCellValue('K1', 'Date début');
        $sheet->setCellValue('L1', 'Date fin');
        $sheet->setCellValue('M1', 'Sujet');
        $sheet->setCellValue('N1', 'Type formation');
        $sheet->setCellValue('O1', 'rémunéré');

        $data = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', $site)
        ->select(DB::raw('stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as sigle'))
        ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
        ->where('stagiaires.annule', '=', false)
        ->orderBy('date_debut','desc')
        ->get();

        // Add data to the sheet
        foreach ($data as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->civilite);
            $sheet->setCellValue('B' . ($row + 2), $rowData->nom);
            $sheet->setCellValue('C' . ($row + 2), $rowData->prenom);
            $sheet->setCellValue('D' . ($row + 2), $rowData->cin);
            $sheet->setCellValue('E' . ($row + 2), $rowData->niveau);
            $sheet->setCellValue('F' . ($row + 2), $rowData->diplome);
            $sheet->setCellValue('G' . ($row + 2), $rowData->etablissement);
            $sheet->setCellValue('H' . ($row + 2), $rowData->type_stage);
            $sheet->setCellValue('I' . ($row + 2), $rowData->nomenc);
            $sheet->setCellValue('J' . ($row + 2), $rowData->sigle);
            $sheet->setCellValue('K' . ($row + 2), $rowData->date_debut);
            $sheet->setCellValue('L' . ($row + 2), $rowData->date_fin);
            $sheet->setCellValue('M' . ($row + 2), $rowData->sujet);
            $sheet->setCellValue('N' . ($row + 2), $rowData->type_formation);
            $sheet->setCellValue('O' . ($row + 2), $rowData->remunere);
        }

        // Set the response headers for Excel file download
        $filename = 'Bilan_stagiaires_en_cours_'.$site.'_'.$today.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Create a writer and save the file to the output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function ExportSta(Request $request)
    {
        $today = Carbon::today()->format('d-m-Y');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $begdate = $request->input('firstdate');
        $enddate = $request->input('secdate');

        $sheet->setCellValue('A1', "Titre");
        $sheet->setCellValue('B1', 'nom');
        $sheet->setCellValue('C1', 'prénom');
        $sheet->setCellValue('D1', 'CIN');
        $sheet->setCellValue('E1', 'niveau');
        $sheet->setCellValue('F1', 'diplome');
        $sheet->setCellValue('G1', 'Ecole');
        $sheet->setCellValue('H1', 'Type de stage');
        $sheet->setCellValue('I1', 'Encadrant');
        $sheet->setCellValue('J1', 'Service');
        $sheet->setCellValue('K1', 'Date début');
        $sheet->setCellValue('L1', 'Date fin');
        $sheet->setCellValue('M1', 'Sujet');
        $sheet->setCellValue('N1', 'Type formation');
        $sheet->setCellValue('O1', 'rémunéré');
        $sheet->setCellValue('P1', 'Annulé');
        $sheet->setCellValue('Q1', 'OP établi');

        $data = DB::table('stagiaires')->where('stagiaires.site', '=', Auth::user()->site)
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants', 'stagiaires.encadrant', '=', 'encadrants.id')
        ->select(DB::raw('stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as sigle'))
        ->whereBetween('date_debut', [$begdate, $enddate])
        ->orderBy('date_debut', 'desc')
        ->get();

        // Add data to the sheet
        foreach ($data as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->civilite);
            $sheet->setCellValue('B' . ($row + 2), $rowData->nom);
            $sheet->setCellValue('C' . ($row + 2), $rowData->prenom);
            $sheet->setCellValue('D' . ($row + 2), $rowData->cin);
            $sheet->setCellValue('E' . ($row + 2), $rowData->niveau);
            $sheet->setCellValue('F' . ($row + 2), $rowData->diplome);
            $sheet->setCellValue('G' . ($row + 2), $rowData->etablissement);
            $sheet->setCellValue('H' . ($row + 2), $rowData->type_stage);
            $sheet->setCellValue('I' . ($row + 2), $rowData->nomenc);
            $sheet->setCellValue('J' . ($row + 2), $rowData->sigle);
            $sheet->setCellValue('K' . ($row + 2), \Carbon\Carbon::parse($rowData->date_debut)->format('d-m-Y'));
            $sheet->setCellValue('L' . ($row + 2), \Carbon\Carbon::parse($rowData->date_fin)->format('d-m-Y'));
            $sheet->setCellValue('M' . ($row + 2), $rowData->sujet);
            $sheet->setCellValue('N' . ($row + 2), $rowData->type_formation);
            $sheet->setCellValue('O' . ($row + 2), $rowData->remunere);
            $sheet->setCellValue('P' . ($row + 2), $rowData->annule);
            $sheet->setCellValue('Q' . ($row + 2), $rowData->OP_etabli);
        }
        // Set the response headers for Excel file download
        $filename = 'Extraction_stagiaires_'.$today.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Create a writer and save the file to the output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function buildQuery(Request $request){
        return DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->join('encadrants', 'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', Auth::user()->site)
        ->where('stagiaires.annule', '=', false)
        ->select('stagiaires.*', 'services.sigle_service as sigle', DB::raw("IFNULL(encadrants.nom, '-') as nomenc"))
        ->when($request->filled('start_date') && $request->filled('end_date'), function ($query) use ($request) {
            return $query->whereBetween('date_debut', [$request->input('start_date'), $request->input('end_date')]);
        })
        ->when($request->filled('remunere'), function ($query) use ($request) {
            return $query->where('remunere', $request->input('remunere'));
        })
        ->when($request->filled('service'), function ($query) use ($request) {
            return $query->where('stagiaires.service', $request->input('service'));
        })
        ->when($request->filled('type_formation'),  function ($query) use ($request) {
            return $query->where('type_formation', $request->input('type_formation'));
        })
        ->when($request->filled('type_stage'),  function ($query) use ($request) {
            return $query->where('type_stage', $request->input('type_stage'));
        })
        ->when($request->filled('diplome'),  function ($query) use ($request) {
            return $query->where('diplome', $request->input('diplome'));
        })
        ->when($request->filled('encadrant'),  function ($query) use ($request) {
            return $query->where('stagiaires.encadrant', $request->input('encadrant'));
        })
        ->when($request->filled('etablissement'),  function ($query) use ($request) {
            return $query->where('stagiaires.etablissement', $request->input('etablissement'));
        });

}


    public function queries(Request $request){
        $query = $this->buildQuery($request);
        Log::info('SQL query:', ['sql' => $query->toSql(), 'bindings' => $query->getBindings()]);
        $results = $query->paginate(13);
        $xx = DB::table('etablissements')->orderBy('sigle_etab', 'asc')->get();
        $ss = DB::table('services')->orderBy('sigle_service', 'asc')->get();
        $ee = DB::table('encadrants')->orderBy('nom','asc')->get();

        return view('indicators.queries', ['results' => $results, 'ss' => $ss, 'xx' => $xx, 'ee' => $ee]);
    }


    public function exportqueries(Request $request)
    {
        $today = Carbon::today()->format('d-m-Y');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', "Titre");
        $sheet->setCellValue('B1', 'nom');
        $sheet->setCellValue('C1', 'prénom');
        $sheet->setCellValue('D1', 'CIN');
        $sheet->setCellValue('E1', 'niveau');
        $sheet->setCellValue('F1', 'diplome');
        $sheet->setCellValue('G1', 'Ecole');
        $sheet->setCellValue('H1', 'Type de stage');
        $sheet->setCellValue('I1', 'Encadrant');
        $sheet->setCellValue('J1', 'Service');
        $sheet->setCellValue('K1', 'Date début');
        $sheet->setCellValue('L1', 'Date fin');
        $sheet->setCellValue('M1', 'Sujet');
        $sheet->setCellValue('N1', 'Type formation');
        $sheet->setCellValue('O1', 'rémunéré');
        $sheet->setCellValue('P1', 'Annulé');
        $sheet->setCellValue('Q1', 'OP établi');

        $query = $this->buildQuery($request);
        $results = $query->get();

        // Add data to the sheet
        foreach ($results as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->civilite);
            $sheet->setCellValue('B' . ($row + 2), $rowData->nom);
            $sheet->setCellValue('C' . ($row + 2), $rowData->prenom);
            $sheet->setCellValue('D' . ($row + 2), $rowData->cin);
            $sheet->setCellValue('E' . ($row + 2), $rowData->niveau);
            $sheet->setCellValue('F' . ($row + 2), $rowData->diplome);
            $sheet->setCellValue('G' . ($row + 2), $rowData->etablissement);
            $sheet->setCellValue('H' . ($row + 2), $rowData->type_stage);
            $sheet->setCellValue('I' . ($row + 2), $rowData->nomenc);
            $sheet->setCellValue('J' . ($row + 2), $rowData->sigle);
            $sheet->setCellValue('K' . ($row + 2), \Carbon\Carbon::parse($rowData->date_debut)->format('d-m-Y'));
            $sheet->setCellValue('L' . ($row + 2), \Carbon\Carbon::parse($rowData->date_fin)->format('d-m-Y'));
            $sheet->setCellValue('M' . ($row + 2), $rowData->sujet);
            $sheet->setCellValue('N' . ($row + 2), $rowData->type_formation);
            $sheet->setCellValue('O' . ($row + 2), $rowData->remunere);
            $sheet->setCellValue('P' . ($row + 2), $rowData->annule);
            $sheet->setCellValue('Q' . ($row + 2), $rowData->OP_etabli);
        }
        // Set the response headers for Excel file download
        $filename = 'Extraction_requête_'.$today.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Create a writer and save the file to the output
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function exportStagiaireTypeFormation(Request $request)
    {
        $year = $request->input('year');
        $today = Carbon::today()->format('d-m-Y');
        return Excel::download(new StagiaireTypeFormationExport($year), 'stagiaire_type_formation_année_' . $year . '_Extrait_le_' . $today . '.xlsx');
    }






    public function graph(Request $request)
    {
        $year = $request->input('year');

        $sta_type_f = Stagiaire::select('type_formation', DB::raw('COUNT(*) as count'))
        ->whereYear('date_debut', $year)
        ->groupBy('type_formation')->get();


        $sta_ser = Stagiaire::select('services.sigle_service', DB::raw('COUNT(*) as count'))
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->whereYear('stagiaires.date_debut', $year)
        ->groupBy('services.sigle_service')
        ->get();

        $sta_ent = Stagiaire::select('services.entite', DB::raw('COUNT(*) as count'))
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->whereYear('stagiaires.date_debut', $year)
        ->groupBy('services.entite')
        ->get();
        $remunereCount = Stagiaire::where('remunere', true)->where('annule',false)
        ->whereYear('date_debut', $year)
        ->count();
        $notRemunereCount = Stagiaire::where('remunere', false)->where('annule',false)
            ->whereYear('date_debut', $year)
            ->count();

        $opEtabliCount = Stagiaire::where('OP_etabli', true)->where('remunere',true)->where('annule',false)
        ->whereYear('date_debut', $year)
        ->count();
        $notOpEtabliCount = Stagiaire::where('OP_etabli', false)->where('remunere',true)->where('annule',false)
            ->whereYear('date_debut', $year)
            ->count();
        return view('indicators.graph',compact('sta_type_f','sta_ser','sta_ent','remunereCount','notRemunereCount','opEtabliCount','notOpEtabliCount'));
    }

    public function backupDatabase(Request $request)
    {
        if ($request->has('table')) {
            $tableName = $request->table;
            $today = Carbon::today()->format('d-m-Y');
            $exportFileName = $tableName . '_export_'.$today.'.sql';
            $exportPath = storage_path('app/' . $exportFileName);

            // Retrieve data from the specified table
            $data = DB::table($tableName)->get()->toArray();

            // Create SQL dump string
            $sqlDump = "-- Export of the '$tableName' table\n\n";

            foreach ($data as $row) {
                $sqlDump .= "INSERT INTO `$tableName` (";
                $columns = [];
                $values = [];

                foreach ($row as $column => $value) {
                    $columns[] = "`$column`";
                    $values[] = "'" . addslashes($value) . "'";
                }

                $sqlDump .= implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ");\n";
            }

            File::put($exportPath, $sqlDump);
            return response()->download($exportPath, $exportFileName);
        } else {
            return redirect()->back()->with('error', 'il fault selectionner un tableau.');
        }
    }

    public function getColumns()
    {
        $Fcol = DB::getSchemaBuilder()->getColumnListing('filieres');
        $Scol = DB::getSchemaBuilder()->getColumnListing('stagiaires');
        $Ecol = DB::getSchemaBuilder()->getColumnListing('etablissements');
        $Sercol = DB::getSchemaBuilder()->getColumnListing('services');
        $Encol = DB::getSchemaBuilder()->getColumnListing('encadrants');

        $columns = [
            'filieres' => $Fcol,
            'stagiaires' => $Scol,
            'etablissements' => $Ecol,
            'services' => $Sercol,
            'encadrants' => $Encol,
        ];
        return view('export', ['columns' => $columns]);
    }

// public function updateData(Request $request)
//     {
//         $table = $request->input('tableSelect');
//         $column = $request->input('columnSelect');
//         $condition = $request->input('condition');
//         $newValue = $request->input('new_value');

//         try {
//             DB::table($table)
//                 ->whereRaw($condition)
//                 ->update([$column => $newValue]);

//             return redirect()->back()->with('success', 'mise à jour avec succès.');
//         } catch (\Exception $e) {
//             Log::error('Failed to update data: ' . $e->getMessage());
//             return redirect()->back()->with('error', 'mise à jour échouée: Une erreur est survenue.');
//         }

//     }
    public function updateData(Request $request)
    {
        $table = $request->input('tableSelect');
        $column_to_edit = $request->input('column_to_edit');
        $new_value = $request->input('new_value');
        $condition_col = $request->input('condition_col');
        $condition_value = $request->input('condition_value');

        try {
            DB::table($table)
                ->where($condition_col, $condition_value)
                ->update([$column_to_edit => $new_value]);

            return redirect()->back()->with('success', 'mise à jour avec succès.');
        } catch (\Exception $e) {
            Log::error('Failed to update data: ' . $e->getMessage());
            return redirect()->back()->with('error', 'mise à jour échouée: Une erreur est survenue.');
        }
    }









}
