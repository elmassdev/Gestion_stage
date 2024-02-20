<?php

namespace App\Http\Controllers;


use App\Models\Stagiaire;
use App\Models\Ville;
use App\Models\Etablissement;
use App\Models\Encadrant;
use App\Models\Filiere;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Rules\UniqueStagiaireInAcademicYear;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

Paginator::useBootstrap();



class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaires = DB::table('stagiaires')
        ->join('services', 'stagiaires.service', '=', 'services.id')
        ->leftJoin('encadrants', 'stagiaires.encadrant', '=', 'encadrants.id')
        ->where('stagiaires.site', '=', Auth::user()->site)
        ->select('stagiaires.*', 'services.sigle_service as sigle', DB::raw("IFNULL(encadrants.nom, '-') as nomenc"))
        ->orderBy('stagiaires.code', 'desc')
        ->paginate(10);
        return view('stagiaires.index', compact('stagiaires'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etablissements = DB::table('etablissements')->orderBy('sigle_etab', 'asc')->get();
        $villes = DB::table('villes')->orderBy('ville', 'asc')->get();
        $services = DB::table('services')->orderBy('sigle_service', 'asc')->get();
        $filieres = DB::table('filieres')->orderBy('filiere', 'asc')->get();
        $encadrants = DB::table('encadrants')->orderBy('nom','asc')->get();
        return view('stagiaires/create',compact('etablissements','villes','services','filieres','encadrants'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nom'=>'required',
                'prenom'=>'required',
                'cin' => ['required', new UniqueStagiaireInAcademicYear],
                'cin'=>'required',
                'filiere'=>'required',
                'service'=>'required',
                'date_debut' => 'required',
                'date_fin'=>'required',
            ]);


            // incrementation du code.

            $year = now()->year;
            $count = Stagiaire::whereYear('created_at', $year)->count() + 1;
            if($count>0){
                $maxCode = Stagiaire::max('code');
                $code =$maxCode + 1;
            }else{
                $formattedCount = sprintf('%04d', 1);
                $code = $year.$formattedCount;
            }

            $stagiaire = new Stagiaire();
            $stagiaire->code =$code;
            $stagiaire->Date_demande = $request->input('date_demande');
            $stagiaire->site = $request->input('site');
            $stagiaire->civilite = $request->input('civilite');
            $stagiaire->prenom =ucwords($request->input('prenom'));
            $stagiaire->nom = ucwords($request->input('nom'));
            $stagiaire->cin = strtoupper($request->input('cin'));
            $stagiaire->phone = $request->input('phone');
            $stagiaire->email = $request->input('email');
            if($request->hasFile('photo')){
                $fileName = ucwords($request->input('nom')).'-'.ucwords($request->input('prenom')).'-'.time().'.'.$request->photo->extension();
                $request->file('photo')->storeAs('images/profile', $fileName,'public');
                $requestData["photo"] = $fileName;
                $stagiaire->photo = $requestData["photo"];
            }else{
                if($stagiaire->civilite=="M."){
                    $stagiaire->photo ='default_m.jpg';
                }else{
                    $stagiaire->photo ='default_f.png';
                }
            }
            $stagiaire->niveau = $request->input('niveau');
            $stagiaire->diplome = $request->input('diplome');
            $stagiaire->filiere = $request->input('filiere');
            $stagiaire->etablissement = $request->input('etablissement');
            $stagiaire->ville = $request->input('ville');
            $stagiaire->type_stage = $request->input('type_stage');
            $stagiaire->type_formation = $request->input('type_formation');
            $stagiaire->service = $request->input('service');
            $stagiaire->encadrant = $request->input('encadrant');
            $stagiaire->date_debut = $request->input('date_debut');
            $stagiaire->date_fin = $request->input('date_fin');
            $stagiaire->sujet= $request->input('sujet');
            $stagiaire->remunere = $request->boolean('remunere');
            $stagiaire->EI = $request->boolean('EI');
            $stagiaire->observation= $request->input('observation');
            $stagiaire->created_by= Auth::user()->nom;
            $stagiaire->save();
            return back()->with('success', 'le stagiaire  '. $code.'   est enregistré avec succès.');

        }catch (\Exception $e) {
            // Catch the exception and add it to the validation errors
            return redirect()->back()->withErrors(['cin' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        $columns = ['nom', 'cin', 'code'];

        $results = DB::table('stagiaires')->where('stagiaires.site', '=', Auth::user()->site)
            ->where(function($query) use($request, $columns) {
                foreach ($columns as $column) {
                    if ($request->input('column') == $column) {
                        $query->orWhere($column, 'like', $request->input('term'));
                    }
                }
            })->paginate(10);
        $stagiaire = Stagiaire::findOrFail($id);
        $previous = Stagiaire::where('id', '<', $stagiaire->id)->max('id');
        $next = Stagiaire::where('id', '>', $stagiaire->id)->min('id');
        $encadrant = Encadrant::where('id','=',$stagiaire->encadrant)->first();
        $service = Service::where('id','=',$stagiaire->service)->first();
        return view('stagiaires.show', compact('stagiaire','encadrant','results','service'))->with('previous', $previous)->with('next', $next);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $etablissements = DB::table('etablissements')->orderBy('sigle_etab', 'asc')->get();
        $villes = DB::table('villes')->orderBy('ville', 'asc')->get();
        $services = DB::table('services')->orderBy('sigle_service', 'asc')->get();
        $filieres = DB::table('filieres')->orderBy('filiere', 'asc')->get();
        $encadrants = DB::table('encadrants')->orderBy('nom','asc')->get();
        $encadr = Encadrant::where('id','=',$stagiaire->encadrant)->first();
        $serv = Service::where('id','=',$stagiaire->service)->first();
        $serv_enc = Service::where('id','=',$stagiaire->service)->first();
        return view('stagiaires.modification',compact('stagiaire','etablissements','villes','services','filieres','encadrants','encadr','serv'));
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
        $stagiaire = Stagiaire::findOrFail($id);
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'cin'=>'required',
            'filiere'=>'required',
            'service'=>'required',
            'date_debut' => ['required'],
            'date_fin'=>'required',
        ]);
        $originalAttributes = $stagiaire->getAttributes();

    // Update only the changed attributes
    foreach ($originalAttributes as $key => $value) {
        if ($request->has($key) && $request->input($key) != $value) {
            $stagiaire->$key = $request->input($key);
        }
    }
        $stagiaire->code = $request->input('code');
        $stagiaire->Date_demande = $request->input('date_demande');
        $stagiaire->site = $request->input('site');
        $stagiaire->civilite = $request->input('civilite');
        $stagiaire->prenom =ucwords($request->input('prenom'));
        $stagiaire->nom = ucwords($request->input('nom'));
        $stagiaire->cin = strtoupper($request->input('cin'));
        $stagiaire->phone = $request->input('phone');
        $stagiaire->email = $request->input('email');
        $stagiaire->niveau = $request->input('niveau');
        $stagiaire->diplome = $request->input('diplome');
        $stagiaire->filiere = $request->input('filiere');
        $stagiaire->etablissement = $request->input('etablissement');
        $stagiaire->ville = $request->input('ville');
        $stagiaire->type_stage = $request->input('type_stage');
        $stagiaire->service = $request->input('service');
        $stagiaire->encadrant = $request->input('encadrant');
        $stagiaire->date_debut = $request->input('date_debut');
        $stagiaire->date_fin = $request->input('date_fin');
        $stagiaire->sujet= $request->input('sujet');
        $stagiaire->remunere = $request->boolean('remunere');
        $stagiaire->EI = $request->boolean('EI');
        $stagiaire->annule = $request->boolean('annule');
        $stagiaire->prolongation = $request->input('prolongation');
        $stagiaire->date_fin_finale	 = $request->input('date_fin_finale');
        $stagiaire->Attestation_remise_le = $request->input('Attestation_remise');
        $stagiaire->Att_remise_a = $request->input('Att_remise_a');
        $stagiaire->observation= $request->input('observation');
        $stagiaire->absence= $request->input('absence');
        $stagiaire->edited_by= Auth::user()->nom;

        $stagiaire->update([
            $stagiaire->code,
            $stagiaire->date_demande,
            $stagiaire->site,
            $stagiaire->civilite,
            $stagiaire->prenom,
            $stagiaire->nom,
            $stagiaire->cin,
            $stagiaire->phone,
            $stagiaire->email,
            $stagiaire->niveau,
            $stagiaire->diplome,
            $stagiaire->filiere,
            $stagiaire->etablissement,
            $stagiaire->ville,
            $stagiaire->type_stage,
            $stagiaire->service,
            $stagiaire->encadrant,
            $stagiaire->date_debut,
            $stagiaire->date_fin,
            $stagiaire->sujet,
            $stagiaire->remunere,
            $stagiaire->EI,
            $stagiaire->edited_by,
            $stagiaire->annule,
            $stagiaire->absence,
            $stagiaire->observation
        ]);

        if($request->hasFile('photo')){
            $old_photo ='storage/images/profile/'.$stagiaire->photo;
            if(File::exists($old_photo)&&($stagiaire->photo!=='default_f.png'&& $stagiaire->photo !=='default_m.jpg')){
                File::delete($old_photo);
            }
            $fileName = ucwords($request->input('nom')).'-'.ucwords($request->input('prenom')).'-'.time().'.'.$request->photo->extension();
            $request->file('photo')->storeAs('images/profile', $fileName,'public');
            $stagiaire->update(['photo' => $fileName]);
        }
        if(($request->input('deletePhoto')=="1")&&(!$request->hasFile('photo'))){
            $old_photo ='storage/images/profile/'.$stagiaire->photo;
                if(File::exists($old_photo)&&($stagiaire->photo!=='default_f.png'&& $stagiaire->photo !=='default_m.jpg')){
                    File::delete($old_photo);
                }
                if($stagiaire->civilite=="M."){
                    $fileName ='default_m.jpg';
                }else{
                    $fileName ='default_f.png';
                }
                $stagiaire->update(['photo' => $fileName]);
            }
        if($stagiaire->photo==='default_f.png' || $stagiaire->photo ==='default_m.jpg'){
            if($stagiaire->civilite=="M."){
                $fileName ='default_m.jpg';
            }else{
                $fileName ='default_f.png';
            }
            $stagiaire->update(['photo' => $fileName]);
        }
        return redirect('/stagiaires/'.$id)->with('msg','Enregistrement modifié avec succès');
    }

    public function duplicate($id){
        $originalStagiaire = Stagiaire::findOrFail($id);
        $currentAcademicYear = date('Y');
        $originalStageStartDate = strtotime($originalStagiaire->date_debut);
        $originalStageYear = date('Y', $originalStageStartDate);
        $originalStageMonth = date('n', $originalStageStartDate);
        $originalAcademicYear = ($originalStageMonth >= 9) ? $originalStageYear + 1 : $originalStageYear;
        $latestStagiaireCode = Stagiaire::orderBy('code', 'desc')->value('code');
        $newStagiaireCode = $latestStagiaireCode + 1;

    // Check if the original academic year is the same as the current academic year
        if ($originalAcademicYear == $currentAcademicYear) {
            $uniqueCin = $this->generateUniqueCin();
            $duplicateStagiaire = $originalStagiaire->replicate();
            $duplicateStagiaire->code = $newStagiaireCode;
            $duplicateStagiaire->cin = $uniqueCin;
        }
        if ($originalAcademicYear != $currentAcademicYear) {
            $duplicateStagiaire = $originalStagiaire->replicate();
            $duplicateStagiaire->code = $newStagiaireCode;
            $duplicateStagiaire->date_debut = date('Y-m-d');
        }

        $duplicateStagiaire->save();
        return redirect()->route('stagiaires.show', $duplicateStagiaire->id)
        ->with('success', 'Enregistrement dupliqué avec succès. Vous pouvez le modifier maintenant.');
    }

    private function generateUniqueCin()
    {
        $randomCin = mt_rand(1000, 9999);
        $existingStagiaire = Stagiaire::where('cin', $randomCin)->exists();

        if ($existingStagiaire) {
            return $this->generateUniqueCin();
        }

        return $randomCin;
    }


    public function updater(Request $request, $id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $originalAttributes = $stagiaire->getAttributes();
        $validatedData = $request->validate([
            'dateLO' => 'nullable|date',
            'date_reception_FFS' => 'nullable|date',
            'date_Att_etablie' => 'nullable|date',
            'Attestation_remise_le' => 'nullable|date',
            'Att_remise_a' => 'nullable|string',
            'OP_etabli_le' => 'nullable|date',
            'indemnite_remise_le' => 'nullable|date',
        ]);

        $modifiedAttributes = array_filter($validatedData, function ($value, $key) use ($originalAttributes) {
            return $originalAttributes[$key] != $value;
        }, ARRAY_FILTER_USE_BOTH);
        //Pour modifier OP_etabli
        if (isset($modifiedAttributes['OP_etabli_le']) && $modifiedAttributes['OP_etabli_le'] !== null) {
            $modifiedAttributes['OP_etabli'] = true;
        }

        $stagiaire->update($modifiedAttributes);
        return redirect()->back()->with('success', 'Information modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stagiaire = Stagiaire::findOrFail($id);
        $old_photo ='storage/images/profile/'.$stagiaire->photo;

        if(File::exists($old_photo)&&($stagiaire->photo!=='default_f.png'&& $stagiaire->photo !=='default_m.jpg')){
            File::delete($old_photo);
        }
        $stagiaire->delete();
        Storage::delete($stagiaire->photo);
        return redirect('/stagiaires/');
    }

    //the below code will be used in the printable documents

    public function generer_attestation($id){
        $stagiaire = Stagiaire::join('civilite', 'stagiaires.civilite', '=', 'civilite.titre')
        ->join('etablissements','stagiaires.etablissement','=','etablissements.sigle_etab')
        ->join('services', 'stagiaires.service','=','services.id')
        ->where('stagiaires.id','=',$id)
               ->get(['civilite.civilite as titre','stagiaires.nom','stagiaires.prenom', 'stagiaires.site', 'civilite.genre as genre','etablissements.etab as etab','etablissements.sigle_etab as sigle_etab','etablissements.article as article','stagiaires.ville','stagiaires.filiere','stagiaires.type_stage','services.direction as direction','stagiaires.date_debut','stagiaires.date_fin','stagiaires.site','stagiaires.EI'])->first();
        $today = date('d F Y');
        $now = Carbon::now();
        // dd($stagiaire);


        $dd = $stagiaire->date_debut;

        $dd = Carbon::parse($dd)->format('d F Y');
        $fin=$stagiaire->date_fin;
        $fin = Carbon::parse($fin)->format('d F Y');
        //2 - prepare the arrays to translate the date
        $englishMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $frenchMonths = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        $dd_short = str_replace($englishMonths, $frenchMonths, $dd);
        $fin_short = str_replace($englishMonths, $frenchMonths, $fin);
        //3- longer date form
        $dayNumber = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
        $dayNumberText = array("premier","deux","trois","quatre","cinq","six","sept","huit","neuf","dix","onze","douze","treize","quatorze","quinze","seize","dix-Sept","dix-huit","dix-neuf","vingt","vingt et un","vingt deux","vingt trois","vingt quatre","vingt cinq","vingt six","vingt sept","vingt huit","vingt neuf","trente","trente et un");
        $yearNumber = array("2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
        $yearText = array("deux mille","deux mille un","deux mille deux","deux mille trois","deux mille quatre","deux mille cinq","deux mille six","deux mille sept","deux mille huit","deux mille neuf","deux mille dix","deux mille onze","deux mille douze","deux mille treize","deux mille quatorze","deux mille quinze","deux mille seize","deux mille dix-sept","deux mille dix-huit","deux mille dix-neuf","deux mille vingt","deux mille vingt et un","deux mille vingt-deux","deux mille vingt-trois", "deux mille vingt-quatre","deux mille vingt-cinq","deux mille vingt-six","deux mille vingt-sept","deux mille vingt-huit","deux mille vingt-neuf","deux mille trente");
        $dd_long1 = str_replace($yearNumber,$yearText,$dd_short);
        $dd_long = str_replace($dayNumber, $dayNumberText, $dd_long1);
        $fin_long1 = str_replace($yearNumber,$yearText,$fin_short);
        $fin_long = str_replace($dayNumber, $dayNumberText, $fin_long1);
        $today = str_replace($englishMonths, $frenchMonths,$today);

            if($stagiaire->EI){
                $pdf =Pdf::loadView('/stagiaires/attestation',compact('stagiaire','dd_short','dd_long','fin_short','fin_long','today'));
            }else{
                $pdf =Pdf::loadView('/stagiaires/attestation_n',compact('stagiaire','dd_short','dd_long','fin_short','fin_long','today'));
            }

        //$pdf =Pdf::loadView('/stagiaires/attestation',compact('stagiaire','dd_short','dd_long','fin_short','fin_long','today'));
        return $pdf->stream();
    }

    public function generer_sujet($id){
        $stagiaire = Stagiaire::join('civilite', 'stagiaires.civilite', '=', 'civilite.titre')
        ->join('etablissements','stagiaires.etablissement','=','etablissements.sigle_etab')
        ->join('services', 'stagiaires.service','=','services.id')
        ->join('encadrants','stagiaires.encadrant','=','encadrants.id')
        ->where('stagiaires.id','=',$id)
               ->get(['civilite.civilite as titre','stagiaires.id','stagiaires.code','stagiaires.date_demande','stagiaires.nom','stagiaires.prenom', 'stagiaires.site','stagiaires.diplome', 'civilite.genre as genre','etablissements.etab as etab','etablissements.sigle_etab as sigle_etab','etablissements.article as article','stagiaires.ville','stagiaires.filiere','stagiaires.type_stage','services.direction as direction','services.sigle_service as sigle_service','stagiaires.date_debut','stagiaires.date_fin','stagiaires.site','stagiaires.EI', 'stagiaires.encadrant','stagiaires.service','stagiaires.niveau', 'services.libelle as lib','encadrants.titre as titreenc','encadrants.nom as nomenc','encadrants.prenom as prenomenc', 'stagiaires.sujet'])->first();

         //ELMASSOUDI Abdelaadim
         // 1 - format the variable date brought from the database to make it easy to translate ( ex : 01 February 2023)
        $today = date('d F Y');
        $year = date('Y');
        $now = Carbon::now();


        $dd = $stagiaire->date_debut;
        $ddemande      = $stagiaire->date_demande;
        $ddemande = Carbon::parse($ddemande)->format('d F Y');
        $dd = Carbon::parse($dd)->format('d F Y');
        $fin=$stagiaire->date_fin;

        $fin = Carbon::parse($fin)->format('d F Y');
        $date_debut = Carbon::parse($dd)->format('d/m/Y');
        $date_fin = Carbon::parse($fin)->format('d/m/Y');
        //2 - prepare the arrays to translate the date
        $englishMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $frenchMonths = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        $dd_short = str_replace($englishMonths, $frenchMonths, $dd);
        $fin_short = str_replace($englishMonths, $frenchMonths, $fin);
        $ddemande = str_replace($englishMonths, $frenchMonths, $ddemande);
        //3- longer date form
        $dayNumber = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
        $dayNumberText = array("premier","deux","trois","quatre","cinq","six","sept","huit","neuf","dix","onze","douze","treize","quatorze","quinze","seize","dix-Sept","dix-huit","dix-neuf","vingt","vingt et un","vingt deux","vingt trois","vingt quatre","vingt cinq","vingt six","vingt sept","vingt huit","vingt neuf","trente","trente et un");
        $yearNumber = array("2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
        $yearText = array("deux mille","deux mille un","deux mille deux","deux mille trois","deux mille quatre","deux mille cinq","deux mille six","deux mille sept","deux mille huit","deux mille neuf","deux mille dix","deux mille onze","deux mille douze","deux mille treize","deux mille quatorze","deux mille quinze","deux mille seize","deux mille dix-sept","deux mille dix-huit","deux mille dix-neuf","deux mille vingt","deux mille vingt et un","deux mille vingt-deux","deux mille vingt-trois", "deux mille vingt-quatre","deux mille vingt-cinq","deux mille vingt-six","deux mille vingt-sept","deux mille vingt-huit","deux mille vingt-neuf","deux mille trente");
        $dd_long1 = str_replace($yearNumber,$yearText,$dd_short);
        $dd_long = str_replace($dayNumber, $dayNumberText, $dd_long1);
        $fin_long1 = str_replace($yearNumber,$yearText,$fin_short);
        $fin_long = str_replace($dayNumber, $dayNumberText, $fin_long1);
        $today = str_replace($englishMonths, $frenchMonths,$today);

        $pdf =Pdf::loadView('/stagiaires/sujet',compact('stagiaire','date_debut','date_fin','dd_short','dd_long','fin_short','fin_long','today','year'));
        return $pdf->stream();
    }


    public function generer_convocation($id){
        $stagiaire = Stagiaire::join('civilite', 'stagiaires.civilite', '=', 'civilite.titre')
        ->join('etablissements','stagiaires.etablissement','=','etablissements.sigle_etab')
        ->join('services', 'stagiaires.service','=','services.id')
        ->join('encadrants','stagiaires.encadrant','=','encadrants.id')
        ->where('stagiaires.id','=',$id)
               ->get(['civilite.civilite as titre','stagiaires.id','stagiaires.code','stagiaires.date_demande','stagiaires.nom','stagiaires.prenom', 'stagiaires.site','stagiaires.diplome', 'civilite.genre as genre','etablissements.etab as etab','etablissements.sigle_etab as sigle_etab','etablissements.article as article','stagiaires.ville','stagiaires.filiere','stagiaires.type_stage','services.direction as direction','stagiaires.date_debut','stagiaires.date_fin','stagiaires.site','stagiaires.EI', 'stagiaires.encadrant','stagiaires.service','stagiaires.niveau', 'services.libelle as lib','services.sigle_service as sigle','encadrants.titre as titreenc','encadrants.nom as nomenc','encadrants.prenom as prenomenc', 'stagiaires.sujet'])->first();


         // 1 - format the variable date brought from the database to make it easy to translate ( ex : 01 February 2023)
        $today = date('d F Y');
        $year = date('Y');



        $ddd = $stagiaire->date_debut;
        $ddemande      = $stagiaire->date_demande;
        $ddemande = Carbon::parse($ddemande)->format('d F Y');
        $dd = Carbon::parse($ddd)->format('d F Y');
        $fin=$stagiaire->date_fin;

        $fin = Carbon::parse($fin)->format('d F Y');
        $date_debut = Carbon::parse($dd)->format('d/m/Y');
        $date_fin = Carbon::parse($fin)->format('d/m/Y');
        //2 - prepare the arrays to translate the date
        $englishMonths = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $frenchMonths = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
        $dd_short = str_replace($englishMonths, $frenchMonths, $dd);
        $fin_short = str_replace($englishMonths, $frenchMonths, $fin);
        $ddemande = str_replace($englishMonths, $frenchMonths, $ddemande);
        //3- longer date form
        $dayNumber = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
        $dayNumberText = array("premier","deux","trois","quatre","cinq","six","sept","huit","neuf","dix","onze","douze","treize","quatorze","quinze","seize","dix-Sept","dix-huit","dix-neuf","vingt","vingt et un","vingt deux","vingt trois","vingt quatre","vingt cinq","vingt six","vingt sept","vingt huit","vingt neuf","trente","trente et un");
        $yearNumber = array("2000","2001","2002","2003","2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014","2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
        $yearText = array("deux mille","deux mille un","deux mille deux","deux mille trois","deux mille quatre","deux mille cinq","deux mille six","deux mille sept","deux mille huit","deux mille neuf","deux mille dix","deux mille onze","deux mille douze","deux mille treize","deux mille quatorze","deux mille quinze","deux mille seize","deux mille dix-sept","deux mille dix-huit","deux mille dix-neuf","deux mille vingt","deux mille vingt et un","deux mille vingt-deux","deux mille vingt-trois", "deux mille vingt-quatre","deux mille vingt-cinq","deux mille vingt-six","deux mille vingt-sept","deux mille vingt-huit","deux mille vingt-neuf","deux mille trente");
        $dd_long1 = str_replace($yearNumber,$yearText,$dd_short);
        $dd_long = str_replace($dayNumber, $dayNumberText, $dd_long1);
        $fin_long1 = str_replace($yearNumber,$yearText,$fin_short);
        $fin_long = str_replace($dayNumber, $dayNumberText, $fin_long1);
        $today = str_replace($englishMonths, $frenchMonths,$today);


            if($stagiaire->EI){
                $pdf =Pdf::loadView('/stagiaires/convocation',compact('stagiaire','date_debut','date_fin','dd_short','dd_long','fin_short','fin_long','today','year'));
            }else{
                $pdf =Pdf::loadView('/stagiaires/convocation_n',compact('stagiaire','ddemande','date_debut','date_fin','dd_short','dd_long','fin_short','fin_long','today','year'));
            }
            return $pdf->stream();
    }

    public function generer_op($id){
        $stagiaire = Stagiaire::join('etablissements','stagiaires.etablissement','=','etablissements.sigle_etab')
        ->join('services', 'stagiaires.service','=','services.id')
        ->where('stagiaires.id','=',$id)
               ->get(['stagiaires.civilite','stagiaires.absence','services.sigle_service as sigle','stagiaires.etablissement','stagiaires.id','stagiaires.code','stagiaires.date_demande','stagiaires.nom','stagiaires.prenom', 'stagiaires.site','stagiaires.cin', 'etablissements.etab as etab','etablissements.sigle_etab as sigle_etab','etablissements.article as article','stagiaires.niveau','stagiaires.diplome','stagiaires.date_debut','stagiaires.date_fin','stagiaires.EI', 'stagiaires.remunere','stagiaires.service', 'stagiaires.dateLO'])->first();

        $dateLO = Carbon::parse($stagiaire->dateLO)->format('d/m/Y');
        $dd = $stagiaire->date_debut;
        $dd = Carbon::parse($dd)->format('d F Y');
        $fin=$stagiaire->date_fin;
        $fin = Carbon::parse($fin)->format('d F Y');
        $date_debut = Carbon::parse($dd)->format('d/m/Y');
        $date_fin = Carbon::parse($fin)->format('d/m/Y');

        // Calcul de nombre des jours
        $niveau = $stagiaire->niveau;
        $diplome = $stagiaire->diplome;
        $absence = $stagiaire->absence;
        $etab = $stagiaire->etablissement;
        $startDate = Carbon::parse($stagiaire->date_debut);
        $endDate = Carbon::parse($stagiaire->date_fin);
        $numberOfDays = ($startDate->diffInDays($endDate))+1;

        if ($niveau == '1ère année' && $diplome == 'Cycle d\'Ingénieur') {
            if($numberOfDays>30 ){
                $numberOfDays=30;
            }
        } elseif ($niveau == '2ème année' && $diplome == 'Cycle d\'Ingénieur') {
            if($numberOfDays>60 ){
                $numberOfDays=60;
            }
        } elseif ($niveau == '3ème année' && $diplome == 'Cycle d\'Ingénieur') {
            if($numberOfDays>120 ){
                $numberOfDays=120;
            }
        } elseif ($niveau == '1ère année' && $diplome == 'Master') {
            if($numberOfDays>60){
                $numberOfDays=60;
            }
        } elseif ($niveau == '2ème année' && $diplome == 'Master') {
            if($numberOfDays>120){
                $numberOfDays=120;
            }
        }elseif ($niveau == '1ère année' && $diplome == 'Mastère spécialisé') {
            if($numberOfDays>60){
                $numberOfDays=60;
            }
        } elseif ($niveau == '2ème année' && $diplome == 'Mastère spécialisé') {
            if($numberOfDays>120){
                $numberOfDays=120;
            }
        } elseif ($niveau == '4ème année' && $diplome == '') {
            if($numberOfDays>60){
                $numberOfDays=60;
            }
        } elseif ($niveau == '5ème année' && $diplome == '') {
            if($numberOfDays>120){
                $numberOfDays=120;
            }
        }elseif (($etab == 'IMM' || $etab == 'IMT') && $niveau == '1ère année') {
            if($numberOfDays>30){
                $numberOfDays=30;
            }
        }elseif (($etab == 'IMM' || $etab == 'IMT') && $niveau == '2ème année') {
            if($numberOfDays>60){
                $numberOfDays=60;
            }
        }

        $dailyFee = 0;

        if ($niveau == '1ère année' && $diplome == 'Cycle d\'Ingénieur') {
            $dailyFee = 50;
        } elseif ($niveau == '2ème année' && $diplome == 'Cycle d\'Ingénieur') {
            $dailyFee = 60;
        } elseif ($niveau == '3ème année' && $diplome == 'Cycle d\'Ingénieur') {
            $dailyFee = 100;
        } elseif ($niveau == '1ère année' && $diplome == 'Master') {
            $dailyFee = 60;
        } elseif ($niveau == '2ème année' && $diplome == 'Master') {
            $dailyFee = 100;
        }elseif ($niveau == '1ère année' && $diplome == 'Mastère spécialisé') {
            $dailyFee = 60;
        } elseif ($niveau == '2ème année' && $diplome == 'Mastère spécialisé') {
            $dailyFee = 100;
        }elseif ($niveau == '1ère année' && $diplome == 'Doctorat') {
            $dailyFee = 100;
        } elseif ($niveau == '2ème année' && $diplome == 'Doctorat') {
            $dailyFee = 100;
        }elseif ($niveau == '4ème année' && $diplome == '') {
            $dailyFee = 60;
        } elseif ($niveau == '5ème année' && $diplome == '') {
            $dailyFee = 100;
        }elseif ($etab == 'IMM' || $etab == 'IMT') {
            $dailyFee = 40;
        }

        $today = date('d/m/Y');
        $carbonDate = Carbon::parse($stagiaire->date_debut, 'Africa/Casablanca');
        $year = $carbonDate->year;
        $now = Carbon::now();
        $somme = $numberOfDays * $dailyFee;
        $retenue = $absence * $dailyFee;
        $net = $somme - $retenue;



        $net_lettres_formatter = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $net_lettres_string = $net_lettres_formatter->format($net);
        $Le_net = htmlspecialchars($net_lettres_string);

        if($stagiaire->remunere){
            $pdf =Pdf::loadView('/stagiaires/op',compact('stagiaire','date_debut','date_fin','dateLO','today','year','somme','retenue','net','Le_net'));
        }
        return $pdf->stream();
    }
}

