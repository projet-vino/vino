<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/get-bouteilles', [BouteilleController::class, 'getBouteilles'])->name('getBouteilles');
Route::get('/ajouter-bouteilles', [AdminController::class, 'FormAjoutBouteilles'])->name('FormAjoutBouteilles');
Route::post('/ajouter-bouteilles', [AdminController::class, 'AjoutBouteilles'])->name('AjoutBouteilles');




