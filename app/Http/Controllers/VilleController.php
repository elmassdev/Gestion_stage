<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg='';
        $editmsg='';
        $villes = Ville::orderBy('ville', 'asc')->paginate(7);
        return view('villes',compact('villes','msg','editmsg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editmsg='';
        $msg='';
        $villes = Ville::orderBy('ville', 'asc')->get();
        return view('villes',compact('villes','msg','editmsg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $msg=''; 

        try {
            // code that performs the database operation
            $villes =ville::create($request->all());
            return view('villes')->with('results',[])->with('msg','<p class=" col-md-6 my-2 rounded bg-success  text-light">Enregistré avec succès</p>');
        } catch (\Illuminate\Database\QueryException $e) {
            // handle the exception
            if($e->getCode() == 23000){
                return view('villes')->with('results',[])->with('msg','<p class=" col-md-6 my-2  rounded warning bg-warning text-light">La ville existe</p>');
            }else{
                return view('villes')->with('results',[])->with('msg','<p class="col-md-6 my-2  rounded  bg-warning text-danger">Merci de vérifier les entrées!</p>');
            }
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ville =Ville::findOrFail($id); 
        return view('ville',['msg'=>'Enregistré avec succes']);
    }

    public function search(Request $request)
    {
        $editmsg ='';
        $msg ='';
        $results=[];
        $query = $request->input('search');
        $results = DB::table('villes')->where('ville', 'like', "%$query%")->paginate(7);
        return view('villes', compact('results','msg','editmsg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $editmsg='';
        $villes = Ville::orderBy('ville', 'asc')->get();
        return view('villes/modification', compact('villes','editmsg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $editmsg ='';
        $oldville = $request->input('oldville');
        $newville = $request->input('newville');
        $newpays =$request->input('newpays');
        DB::table('villes')
            ->where('ville', '$oldville')
            ->update(['ville' => '$newville','pays' => '$newpays']);
        return view('villes', compact('villes'))->with('editmsg','Modifié avec succes');
        
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
