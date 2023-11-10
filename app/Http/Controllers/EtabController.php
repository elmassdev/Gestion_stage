<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class EtabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etab =Etablissement::all();
        
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
        $msg=''; 

        try {
            // code that performs the database operation
            $etab =Etablissement::create($request->all());
            return view('etablissement')->with('results',[])->with('msg','<p class=" col-md-6 my-2 rounded bg-success  text-light">Enregistré avec succès</p>');
        } catch (\Illuminate\Database\QueryException $e) {
            // handle the exception
            if($e->getCode() == 23000){
                return view('etablissement')->with('results',[])->with('msg','<p class=" col-md-6 my-2  rounded warning bg-warning text-light">L\'etablissement existe</p>');
            }else{
                return view('etablissement')->with('results',[])->with('msg','<p class="col-md-6 my-2  rounded  bg-warning text-danger">Merci de vérifier les entrées!</p>');
            }
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $msg ='';
        $results=[];
        $query = $request->input('search');
        $results = DB::table('etablissements')->where('sigle_etab', 'like', "%$query%")->paginate(4);
        return view('etablissement', compact('results','msg'));
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
