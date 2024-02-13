<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ChercheurController;
use App\Http\Controllers\EntrepriseController;



use App\Http\Middleware\Chercheur;
use App\Http\Middleware\Entreprise;
use App\Models\Emploi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/jobOffers', [EmploiController::class, 'publishOfferAll'])->name('AllOffers');

Route::get('/jobs', [EmploiController::class, 'publishOffer'])->middleware(['auth', 'entreprise'])->name('jobs');
Route::get('/candidats/{offreId}', [EmploiController::class, 'viewCandidats'])->middleware(['auth', 'entreprise'])->name('candidats');

Route::post('/jobs', [EmploiController::class, 'storePublishOffer'])->name('jobs.store');


Route::get('/cvs', [CvController::class, 'createCV'])->middleware(['auth', 'chercheur'])->name('cvs');
Route::post('/cvs', [CvController::class, 'storeCV'])->name('cvs.store');
Route::get('/download', [CVController::class, 'downloadCv'])->middleware(['auth', 'chercheur'])->name('downloadCv');
Route::post('/postuler/{emploi}', [EmploiController::class, 'postuler'])->name('postuler');

// Route::get('/search', [EmploiController::class, 'searchEmploi'])->name('offers.search');





Route::get('/profileUser', [ChercheurController::class, 'profileUser'])->middleware(['auth', 'chercheur'])->name('profileUser');


Route::get('/archive-entreprise/{userId}', [EntrepriseController::class, 'archiverEntreprise'])->middleware(['auth', 'admin'])->name('archive.entreprise');
Route::get('/archive-offer/{offerId}', [EmploiController::class, 'archiverOffer'])->middleware(['auth', 'admin'])->name('archive.offer');


Route::get('/archive', [HomeController::class, 'archive'])->middleware(['auth', 'admin'])->name('archive');
// Route::get('/archive/{userId}', [ChercheurController::class, 'archiverChercheur'])->middleware(['auth', 'admin'])->name('archive.chercheur');



Route::get('/entreprises', [EntrepriseController::class, 'AfficheEntreprises'])->middleware(['auth', 'admin'])->name('entreprises');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
