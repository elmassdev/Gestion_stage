<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Service;
Paginator::useBootstrap();

class EncadrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encadrants = DB::table('encadrants')
        ->join('services', 'encadrants.service', '=', 'services.id')->select('encadrants.*', 'services.sigle_service as sigle')->paginate(8);
        return view('encadrants.index',compact('encadrants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::orderBy('sigle_service', 'asc')->get();
        return view('encadrants.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required',
            'prenom'=>'required',
            'nom'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'service'=>'required',
        ]);
        $encadrant = new Encadrant();
        $encadrant->titre = $request->input('titre');
        $encadrant->prenom =ucwords($request->input('prenom'));
        $encadrant->nom = ucwords($request->input('nom'));
        $encadrant->phone = $request->input('phone');
        $encadrant->email = $request->input('email');
        $encadrant->service = $request->input('service');
        $encadrant->save();

        //$encadrants =Encadrant::create($request->all());
        return redirect('/encadrants')->with('msg','Enregistré avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $columns = ['nom', 'prenom', 'service'];

        $results = DB::table('encadrants')->join('services', 'encadrants.service', '=', 'services.id')
        ->select('encadrants.*','services.sigle_service as sigle')
            ->where(function($query) use($request, $columns) {
                foreach ($columns as $column) {
                    if ($request->input('column') == $column) {
                        $query->orWhere($column, '=', $request->input('term'));
                    }
                }
            })->paginate(10);
        $encadrant = DB::table('encadrants')
        ->join('services', 'encadrants.service', '=', 'services.id')
        ->select('encadrants.*', 'services.sigle_service as sigle')
        ->where('encadrants.id', '=', $id)
        ->first(); 

        $previous = Encadrant::where('id', '<', $encadrant->id)->max('id');
        $next = Encadrant::where('id', '>', $encadrant->id)->min('id');
        return view('encadrants.show', compact('encadrant','results'))->with('previous', $previous)->with('next', $next);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encadrant = Encadrant::findOrFail($id);
        $services = Service::orderBy('sigle_service', 'asc')->get();
        return view('encadrants.modification',compact('encadrant','services'));
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
        $encadrant = Encadrant::findOrFail($id);
        $request->validate([
            'titre'=>'required',
            'nom'=>'required',
            'prenom'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'service'=>'required',
        ]);

        $encadrant->update($request->all());
        return redirect('/encadrants')->with('msg','Enregistrement modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encadrant = Encadrant::findOrFail($id);
        $encadrant->delete();
        return redirect('/encadrants');
    }
}
