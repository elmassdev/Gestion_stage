<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class EtabController extends Controller
{

    public function index()
    {
        $etablissements= Etablissement::orderBy('sigle_etab', 'asc')->paginate(10);

        return view('etablissements.index', compact('etablissements'));
    }

    public function create()
    {
        return view('etablissements.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sigle_etab' => 'required|unique:etablissements|max:255',
            'etab' => 'required|max:255',
            'statut' => 'required',
            'type' => 'required',
            'article' => 'required',
            'pays' => 'nullable',
        ]);

        Etablissement::create($validatedData);

        return redirect()->route('etablissements.index')->with('success', 'Etablissement ajouté avec succès!');
    }

    public function show($sigle_etab)
    {
        $etablissement = Etablissement::findOrFail($sigle_etab);

        return view('etablissements.show', compact('etablissement'));
    }

    public function edit($sigle_etab)
    {
        $etablissement = Etablissement::findOrFail($sigle_etab);

        return view('etablissements.edit', compact('etablissement'));
    }

    public function update(Request $request, $sigle_etab)
    {
        $validatedData = $request->validate([
            'etab' => 'required|max:255',
            'statut' => 'required',
            'type' => 'required',
            'article' => 'required',
            'pays' => 'required',
        ]);

        Etablissement::where('sigle_etab', $sigle_etab)->update($validatedData);

        return redirect()->route('etablissements.index')->with('success', 'Etablissement modifié avec succès!');
    }

    public function destroy($sigle_etab)
    {
        Etablissement::findOrFail($sigle_etab)->delete();

        return redirect()->route('etablissements.index')->with('success', 'Etablissement supprimé avec succès!!');
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $etab =Etablissement::all();

    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $msg='';

    //     try {
    //         // code that performs the database operation
    //         $etab =Etablissement::create($request->all());
    //         return view('etablissement')->with('results',[])->with('msg','<p class=" col-md-6 my-2 rounded bg-success  text-light">Enregistré avec succès</p>');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         // handle the exception
    //         if($e->getCode() == 23000){
    //             return view('etablissement')->with('results',[])->with('msg','<p class=" col-md-6 my-2  rounded warning bg-warning text-light">L\'etablissement existe</p>');
    //         }else{
    //             return view('etablissement')->with('results',[])->with('msg','<p class="col-md-6 my-2  rounded  bg-warning text-danger">Merci de vérifier les entrées!</p>');
    //         }
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function search(Request $request)
    {
        $msg ='';
        $results=[];
        $query = $request->input('search');
        $results = DB::table('etablissements')->where('sigle_etab', 'like', "%$query%")->paginate(4);
        return view('etablissement', compact('results','msg'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
