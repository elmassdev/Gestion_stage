<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\VilleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EtabController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\IndicatorsController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\PermissionController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UserController;
use App\Exports\StagiairesExport;
use App\Exports\FilieresExport;
use App\Exports\UsersExport;
use App\Exports\ServicesExport;
use App\Exports\EtablissementsExport;
use App\Exports\EncadrantsExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Files\FileType;
// use Maatwebsite\Excel\Files\FileType as ExcelFileType;
use Maatwebsite\Excel\Excel as ExcelFileType;
use Illuminate\Support\Facades\Response;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::view('/contact', 'contact');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth', 'can:view_indicators'])->group(function (){
    Route::resource('indicators/index', IndicatorsController::class)->middleware('auth');
    Route::get('/indicators/queries', [IndicatorsController::class, 'queries'])->name('indicators.queries')->middleware('auth');
    Route::get('/indicators/ExcelStaSer', [IndicatorsController::class, 'ExcelStaSer']);
    Route::get('/indicators/ExcelStaEnc', [IndicatorsController::class, 'ExcelStaEnc']);
    Route::get('/indicators/ListeCurrentSta', [IndicatorsController::class, 'ListeCurrentSta']);
    Route::get('/indicators/ExportSta', [IndicatorsController::class, 'ExportSta']);
    Route::get('/export/queries', [IndicatorsController::class, 'exportqueries'])->name('export.excel');
    Route::get('/indicators/graph', [IndicatorsController::class, 'graph'])->name('graph');
});

Route::middleware(['auth', 'role:admin'])->group(function (){
    Route::view('/export', 'export');
    Route::get('/stagiaires', [App\Http\Controllers\StagiaireController::class, 'index'])->name('stagiaires/index')->middleware('auth');
    Route::get('/stagiaires/create', [App\Http\Controllers\StagiaireController::class, 'create'])->name('stagiaires/create')->middleware('auth');
    Route::post('/stagiaires/create', [App\Http\Controllers\StagiaireController::class, 'store'])->name('stagiaires/create')->middleware('auth');
    Route::get('/stagiaires/{id}', 'App\Http\Controllers\StagiaireController@show')->name('stagiaires.show')->middleware('auth'); //second method
    Route::delete('/stagiaires/{id}', 'App\Http\Controllers\StagiaireController@destroy')->name('stagiaire.destroy')->middleware('auth');
    Route::get('stagiaires/{id}/modification', 'App\Http\Controllers\StagiaireController@edit')->middleware('auth');
    Route::put('/stagiaires/{id}/modification', [App\Http\Controllers\StagiaireController::class, 'update'])->name('modification')->middleware('auth');
    Route::get('/stagiaires/{id}/op','App\Http\Controllers\StagiaireController@generer_op')->name('op')->middleware('auth');
    Route::get('/stagiaires/{id}/attestation','App\Http\Controllers\StagiaireController@generer_attestation')->name('attestation')->middleware('auth');
    Route::get('/stagiaires/{id}/attestation_n','App\Http\Controllers\StagiaireController@generer_attestation')->name('attestation_n')->middleware('auth');
    Route::get('/stagiaires/{id}/convocation','App\Http\Controllers\StagiaireController@generer_convocation')->name('convocation')->middleware('auth');
    Route::get('/stagiaires/{id}/convocation_n','App\Http\Controllers\StagiaireController@generer_convocation')->name('convocation_n')->middleware('auth');
    Route::get('/stagiaires/{id}/sujet','App\Http\Controllers\StagiaireController@generer_sujet')->name('sujet')->middleware('auth');
    Route::put('/stagiaires/{id}', [App\Http\Controllers\StagiaireController::class, 'updater']);
    Route::resource('villes', VilleController::class)->middleware('auth');
    Route::resource('encadrants', EncadrantController::class)->middleware('auth');
    Route::resource('services', ServiceController::class)->middleware('auth');
    Route::get('encadrants/{id}/modification', 'App\Http\Controllers\EncadrantController@edit')->middleware('auth');
    Route::post('encadrants/{id}/modification', 'App\Http\Controllers\EncadrantController@update')->middleware('auth');
    Route::post('/encadrants/create', [App\Http\Controllers\EncadrantController::class, 'store'])->name('encadrants/create')->middleware('auth');
    Route::resource('etablissements', EtabController::class)->middleware('auth');
    Route::resource('filieres', FiliereController::class)->middleware('auth');
    // Route::get('/stagiaires/{id}', 'App\Http\Controllers\StagiaireController@duplicate')->name('duplicate');
    Route::get('/stagiaires/{id}/duplicate', 'App\Http\Controllers\StagiaireController@duplicate')->name('stagiaires.duplicate');

    // Route::get('/stagiaires/{id}', 'StagiaireController@show')->name('stagiaires.show');







    //export DB to Excel
    $today = date('d F Y');

    Route::get('/export-stagiaires', function () {
        $today = date('d F Y');
        return Excel::download(new StagiairesExport, 'stagiaires - '.$today.'.xlsx');
    });
    Route::get('/export-filieres', function () {
        $today = date('d F Y');
        return Excel::download(new FilieresExport, 'filieres - '.$today.'.xlsx');
    });
    Route::get('/export-etablissements', function () {
        $today = date('d F Y');
        return Excel::download(new EtablissementsExport, 'etablissements - '.$today.'.xlsx');
    });
    Route::get('/export-encadrants', function () {
        $today = date('d F Y');
        return Excel::download(new EncadrantsExport, 'encadrants - '.$today.'.xlsx');
    });
    Route::get('/export-services', function () {
        $today = date('d F Y');
        return Excel::download(new ServicesExport, 'services - '.$today.'.xlsx');
    });
    Route::get('/export/stagiaire-type-formation', [IndicatorsController::class, 'exportStagiaireTypeFormation']);

});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('auth.register', [RegisterController::class, 'showRegistrationForm']);
    Route::get('/admin/permissions', [PermissionController::class, 'index']);
    Route::post('/admin/permissions/assign-roles/{userId}', [PermissionController::class, 'assignRoles']);
    Route::post('/admin/permissions/assign-permissions/{roleId}', [PermissionController::class, 'assignPermissions']);
    Route::get('/user/assign-roles', [UserController::class, 'show'])->name('user.assignRoles');
    Route::post('/user/assign-roles', [UserController::class, 'assignRoles'])->name('user.assignRoles');
    Route::get('/user/assign-permissions', [UserController::class, 'showPermissions'])->name('user.assignPermissions');
    Route::post('/user/assign-permissions', [UserController::class, 'assignPermissions'])->name('user.assignPermissions');
    Route::get('/export-users', function () {
        return Excel::download(new UsersExport, 'users.xlsx');
    });
});

Route::middleware(['auth', 'can:view_surete_page'])->group(function () {
    Route::get('/surete', [App\Http\Controllers\SureteController::class, 'index'])->name('surete/index');
    Route::get('/surete/save', [App\Http\Controllers\SureteController::class, 'canvasStage']);
});








