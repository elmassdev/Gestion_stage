<?php

namespace App\Http\Controllers;


use App\Models\Stagiaire;
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


Paginator::useBootstrap();

class IndicatorsController extends Controller
{

    public function index(Request $request)
    {
        $tday =Carbon::today();
        $stagiaires = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, services.sigle_service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('services.sigle_service')
            ->orderBy('total','desc')
            ->get();

        $stagenc = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('nomenc')
            ->orderBy('total','desc')
            ->get();
        $query = $request->input('search');
        $results = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->where('stagiaires.site', '=', Auth::user()->site)
            ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
            ->where('date_debut', '=', $query)->where('stagiaires.annule', '=', false)
            ->orderBy('code', 'desc')
            ->paginate(20);

        $statoday = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', Auth::user()->site)
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
        ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
        ->where('stagiaires.annule', '=', false)->paginate(4);

        $monthlysta = Stagiaire::select(DB::raw('COUNT(*) as total'), DB::raw('MONTH(date_debut) as mois'), DB::raw('YEAR(date_debut) as annee'))
            ->whereRaw('date_debut >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)')
            ->groupBy(DB::raw('YEAR(date_debut)'), DB::raw('MONTH(date_debut)'))
            ->orderBy('annee', 'asc')
            ->orderBy('mois', 'asc')
            ->get();

        return view('indicators.index',compact('stagiaires','stagenc','statoday','results','monthlysta'));
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

        // Create a writer and save the file to the output
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
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as sigle'))
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

        $data = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants', 'stagiaires.encadrant', '=', 'encadrants.id')
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as sigle'))
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

}
