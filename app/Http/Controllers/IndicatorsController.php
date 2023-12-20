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

Paginator::useBootstrap();

class IndicatorsController extends Controller
{

    public function index(Request $request)
    {
        $tday =Carbon::today();
        $stagiaires = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->select(DB::raw('count(*) as total, services.sigle_service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('services.sigle_service')
            ->get();

        $stagenc = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->where('stagiaires.annule', '=', false)
            ->groupBy('nomenc')
            ->get();

            $query = $request->input('search');
            $results = DB::table('stagiaires')
            ->join('services', 'stagiaires.service', '=', 'services.id')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
            ->where('date_debut', '=', $query)->where('stagiaires.annule', '=', false)
            ->orderBy('id', 'desc')
            ->paginate(20);


        $statoday = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc, services.sigle_service as service'))
        ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
        ->where('stagiaires.annule', '=', false)->paginate(6);
        return view('indicators.index',compact('stagiaires','stagenc','statoday','results'));
    }

    public function ParService()
    {
        $result = DB::table('stagiaires')
        ->select(
            'encadrants.id as encadrant_id',
            'encadrants.nom as encadrant_nom',
            'encadrants.prenom as encadrant_prenom',
            'services.id as service_id',
            'services.libelle as service_libelle',
            DB::raw('MONTH(stagiaires.date_debut) as month'),
            DB::raw('YEAR(stagiaires.date_debut) as year'),
            DB::raw('COUNT(*) as count_stagiaires')
        )
        ->join('encadrants', 'stagiaires.encadrant', '=', 'encadrants.nom')
        ->join('services', 'stagiaires.service', '=', 'services.libelle')
        ->groupBy('encadrants.id', 'encadrants.nom', 'encadrants.prenom', 'services.id', 'services.libelle', 'month', 'year')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();
        return view('indicators.parservice', ['result' => $result]);
    }


}
