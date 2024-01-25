<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $services = Service::paginate(15);
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sigle_service' => 'required|unique:services',
            'libelle' => 'required',
            'entite' => 'required',
            'site' => 'required',
            'direction' => 'required',

        ]);

        $service =new Service();
        $service->sigle_service = $request->input('sigle_service');
        $service->libelle = $request->input('libelle');
        $service->entite = $request->input('entite');
        $service->site = $request->input('site');
        $service->direction = $request->input('direction');
        $service->secretariat = $request->input('secretariat');
        $service->EPI = $request->boolean('EPI');
        $service->save();

        // Service::create($request->all());

        return redirect()->route('services.index')->with('success', 'Service crée avec succès');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'libelle' => 'required',
            'entite' => 'required',
            'site' => 'required',
            'direction' => 'required',
        ]);
        $service->sigle_service = $request->input('sigle_service');
        $service->libelle = $request->input('libelle');
        $service->entite = $request->input('entite');
        $service->site = $request->input('site');
        $service->direction = $request->input('direction');
        $service->secretariat = $request->input('secretariat');
        $service->EPI = $request->boolean('EPI');

        $service->update();

        return redirect()->route('services.index')->with('success', 'Service modifié!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé!');
    }











    // public function index()
    // {
    //     $services =Service::all();
    //     return view('services.index', compact('services'));
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
    //         $services = new Service();
    //         $services->sigle_service = $request->input('sigle_service');
    //         $services->libelle = $request->input('libelle');
    //         $services->entite = $request->input('entite');
    //         $services->site =$request->input('site');
    //         $services->direction = $request->input('direction');
    //         $services->EPI = $request->boolean('EPI');
    //         $services->save();
    //         return view('service')->with('results',[])->with('msg','<p class=" col-md-6 my-2 rounded bg-success  text-light">Enregistré avec succès</p>');
    //     } catch (\Illuminate\Database\QueryException $e) {
    //         // handle the exception
    //         if($e->getCode() == 23000){
    //             return view('service')->with('results',[])->with('msg','<p class=" col-md-6 my-2  rounded warning bg-warning text-light">L\'service existe</p>');
    //         }else{
    //             return view('service')->with('results',[])->with('msg','<p class="col-md-6 my-2  rounded  bg-warning text-danger">Merci de vérifier les entrées!</p>');
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
    //     $results = DB::table('services')->where('sigle_service', 'like', "%$query%")->paginate(5);;
    //     return view('service.index', compact('results','msg'));
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
