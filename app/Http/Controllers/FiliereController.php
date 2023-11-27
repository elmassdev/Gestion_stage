<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class FiliereController extends Controller
{
    public function index()
    {
        $filieres= Filiere::orderBy('filiere', 'asc')->paginate(15);
        return view('filieres.index', compact('filieres'));
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'filiere' => 'required|unique:filieres|max:255',
            'profil' => 'required',
        ]);

        Filiere::create($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filiere ajoutée avec succès!');
    }

    public function show($id)
    {
        $filiere = Filiere::findOrFail($id);

        return view('filieres.show', compact('filiere'));
    }

    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);

        return view('filieres.edit', compact('filiere'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'filiere' => 'required|max:255',
            'profil' => 'required',
        ], [
            'filiere.unique' => 'The combination of Filiere and Profil must be unique.',
        ]);

        Filiere::where('id', $id)->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Modification terminée avec succès!');
    }

    public function destroy($id)
    {
        Filiere::findOrFail($id)->delete();

        return redirect()->route('filieres.index')->with('success', 'Filière supprimée!');
    }















    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $filiere = Filiere::orderBy('filiere', 'asc')->get();
    //     return view('filiere',compact('filiere','msg'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $msg='';
    //     $filieres = Filiere::orderBy('filiere', 'asc')->get();
    //     return view('filiere',compact('filiere','msg'));
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
    //         $filiere =Filiere::create($request->all());
    //         return view('filiere')->with('results',[])->with('msg','<p class=" col-md-6 my-2 rounded bg-success  text-light">Enregistré avec succès</p>');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         // handle the exception
    //         if($e->getCode() == 23000){
    //             return view('filiere')->with('results',[])->with('msg','<p class=" col-md-6 my-2  rounded warning bg-warning text-light">La filière existe</p>');
    //         }else{
    //             return view('filiere')->with('results',[])->with('msg','<p class="col-md-6 my-2  rounded  bg-warning text-danger">Merci de vérifier les entrées!</p>');
    //         }
    //     }
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Request $request)
    // {
    //     $msg ='';
    //     $results=[];
    //     $query = $request->input('search');
    //     $results = DB::table('filieres')->where('filiere', 'like', "%$query%")->get();
    //     return view('filiere', compact('results','msg'));
    // }

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
