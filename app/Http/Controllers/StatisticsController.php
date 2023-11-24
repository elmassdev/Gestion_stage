<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encadrant;
use app\Models\Stagiaire;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;


Paginator::useBootstrap();

class StatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tday =Carbon::today();
        $stagiaires = DB::table('stagiaires')
            ->select(DB::raw('count(*) as total, service'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->groupBy('service')
            ->get();
        $stagenc = DB::table('stagiaires')
            ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
            ->select(DB::raw('count(*) as total, encadrants.nom as nomenc'))
            ->whereRaw('date_debut <= NOW() and date_fin >= NOW()')
            ->groupBy('nomenc')
            ->get();
            $query = $request->input('search');
        $results = DB::table('stagiaires')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc'))
        ->where('date_debut', '=', $query)->paginate(6);

        $statoday = DB::table('stagiaires')
        ->leftJoin('encadrants',  'stagiaires.encadrant', '=', 'encadrants.id')
        ->select(DB::raw('Stagiaires.*, encadrants.titre as titreenc, encadrants.nom as nomenc'))
        ->where('date_debut', '=', $tday)->paginate(6);
        return view('statistiques',compact('stagiaires','stagenc','statoday','results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
