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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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
Route::view('/contact', 'contact');
Route::resource('villes', VilleController::class)->middleware('auth');
Route::resource('encadrants', EncadrantController::class)->middleware('auth');
Route::resource('services', ServiceController::class)->middleware('auth');
Route::get('encadrants/{id}/modification', 'App\Http\Controllers\EncadrantController@edit')->middleware('auth');
Route::post('encadrants/{id}/modification', 'App\Http\Controllers\EncadrantController@update')->middleware('auth');
Route::post('/encadrants/create', [App\Http\Controllers\EncadrantController::class, 'store'])->name('encadrants/create')->middleware('auth');
Route::resource('etablissements', EtabController::class)->middleware('auth');
Route::resource('filieres', FiliereController::class)->middleware('auth');
Route::resource('indicators/index', IndicatorsController::class)->middleware('auth');


Route::get('/indicators/parservice', [IndicatorsController::class, 'ParService'])->name('encadrants/create')->middleware('auth');
Route::get('/indicators/ExcelStaSer', [IndicatorsController::class, 'ExcelStaSer']);
Route::get('/indicators/ExcelStaEnc', [IndicatorsController::class, 'ExcelStaEnc']);
Route::get('/indicators/ListeCurrentSta', [IndicatorsController::class, 'ListeCurrentSta']);
Route::get('/indicators/ExportSta', [IndicatorsController::class, 'ExportSta']);
Route::get('/indicators/charts', [ChartController::class, 'StagParEnc']);
