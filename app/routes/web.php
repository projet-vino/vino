<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\CellierController;
use App\Http\Controllers\CustomAuthController;

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

//route pour importer les bouteilles de SAQ vers notre base de données
//Route::get('/get-bouteilles', [BouteilleController::class, 'getBouteilles'])->name('getBouteilles')->middleware('auth');
Route::get('/ajouter-bouteilles', [BouteilleController::class, 'AdminAjoutBouteilles'])->name('FormAjoutBouteilles')->middleware('auth');
Route::post('/ajouter-bouteilles', [BouteilleController::class, 'AjoutBouteilles'])->name('AjoutBouteilles')->middleware('auth');

//route pour importer les details pour chaque bouteille dans la base de données
Route::get('/info-bouteilles', [BouteilleController::class, 'addInfoBouteilles'])->name('bouteille.info');

//route pour la pages recherche
Route::get('/recherche', [BouteilleController::class, 'index'])->name('bouteille.recherche')->middleware('auth');

//route pour afficher le details d'une bouteille
Route::get('/vin/{bouteille}/show', [BouteilleController::class, 'show'])->name('bouteille.show')->middleware('auth');

//Route pour le formulaire d'ajout des bouteilles dans cellier
Route::post('/affichier-bouteille-au-cellier', [BouteilleController::class, 'formBouteillesAuCeiller'])->name('affichier.bouteille.cellier')->middleware('auth');

//Route pour ajouter bouteilles dans cellier
Route::post('/ajouter-bouteille-au-cellier', [BouteilleController::class, 'ajouterBouteillesAuxCeiller'])->name('ajout.bouteille.cellier')->middleware('auth');




//Route::get('liste-produits/{page}', [BouteilleController::class, 'getProduits'])->name('listeProduits');

Route::get('/celliers', [CellierController::class, 'index'])->name('cellier.index')->middleware('auth');
Route::get('/cellier/ajouter', [CellierController::class, 'create'])->name('cellier.create')->middleware('auth');

Route::post('/cellier', [CellierController::class, 'store'])->name('cellier.store')->middleware('auth');

Route::get('/cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show')->middleware('auth');
Route::put('/cellier/{cellier}', [CellierController::class, 'update'])->name('cellier.update')->middleware('auth');
Route::delete('/cellier/{cellier}', [CellierController::class, 'destroy'])->name('cellier.destroy')->middleware('auth');

Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.create');
Route::post('/registration', [CustomAuthController::class, 'store']);
Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'authentication']);
Route::get('/accueil', [CustomAuthController::class, 'accueil'])->name('accueil')->middleware('auth');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');





// Route pour afficher un usager dans la page profil
Route::get('/user/{user_id}', [CustomAuthController::class, 'show'])->name('auth.show')->middleware('auth');

// Route pour afficher un usager pour faire une mise à jour
Route::get('/user-edit/{user_id}', [CustomAuthController::class, 'edit'])->name('auth.edit');

// Route pour mettre à jour un usager
Route::put('/user-edit/{user_id}', [CustomAuthController::class, 'update']);

// Route pour supprimer un usager
Route::delete('/user-edit/{user_id}', [CustomAuthController::class, 'destroy'])->name('auth.delete');

// Route pour afficher la page des usagers. Seulement accessible par l'administrateur
Route::get('/admin-user-list', [CustomAuthController::class, 'userList'])->name('user.list');
// Supprime un usager de la liste des usagers
Route::delete('/admin-user-list/{user}', [CustomAuthController::class, 'deleteUserList'])->name('user.delete');

