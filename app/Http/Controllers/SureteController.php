<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use App\Models\Stagiaire;
use App\Models\Ville;
use App\Models\Etablissement;
use App\Models\Encadrant;
use App\Models\Filiere;
use App\Models\Service;
use Carbon\Carbon;

Paginator::useBootstrap();


class SureteController extends Controller
{
    public function index()
    {
        $stagiaires = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', Auth::user()->site)
        ->select('stagiaires.*', 'services.sigle_service as sigle', DB::raw("IFNULL(encadrants.nom, '-') as nomenc"))
        ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
        ->where('stagiaires.annule', '=', false)
        ->orderBy('stagiaires.date_debut','desc')
        ->paginate(10);
        return view('surete.index', compact('stagiaires'));
    }

    public function canvasStage()
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
        $sheet->setCellValue('I1', 'Encadrant');
        $sheet->setCellValue('J1', 'Service');
        $sheet->setCellValue('K1', 'Date début');
        $sheet->setCellValue('L1', 'Date fin');
        $sheet->setCellValue('M1', "Photo");

        $data = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', $site)
        ->select(DB::raw('stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as sigle'))
        ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
        ->where('stagiaires.annule', '=', false)
        ->orderBy('date_debut','desc')
        ->get();

        foreach ($data as $row => $rowData) {
            $sheet->setCellValue('A' . ($row + 2), $rowData->civilite);
            $sheet->setCellValue('B' . ($row + 2), $rowData->nom);
            $sheet->setCellValue('C' . ($row + 2), $rowData->prenom);
            $sheet->setCellValue('D' . ($row + 2), $rowData->cin);
            $sheet->setCellValue('E' . ($row + 2), $rowData->niveau);
            $sheet->setCellValue('F' . ($row + 2), $rowData->diplome);
            $sheet->setCellValue('G' . ($row + 2), $rowData->etablissement);
            $sheet->setCellValue('I' . ($row + 2), $rowData->nomenc);
            $sheet->setCellValue('J' . ($row + 2), $rowData->sigle);
            $sheet->setCellValue('K' . ($row + 2), $rowData->date_debut);
            $sheet->setCellValue('L' . ($row + 2), $rowData->date_fin);
            $photoPath = public_path('storage/images/profile/'.$rowData->photo);
            if (file_exists($photoPath)) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Photo');
                $drawing->setDescription('Photo');
                $drawing->setPath($photoPath);
                $drawing->setHeight(80);
                $drawing->setCoordinates('M' . ($row + 2));
                $drawing->setWorksheet($sheet);
                $sheet->getRowDimension($row + 2)->setRowHeight($drawing->getHeight());
            }
        }
        $filename = 'Canevas_Stagiaires_'.$site.'_'.$today.'.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }



}
