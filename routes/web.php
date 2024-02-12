<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ChercheurController;

use App\Http\Middleware\Chercheur;
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
Route::post('/jobs', [EmploiController::class, 'storePublishOffer'])->name('jobs.store');


Route::get('/cvs', [CvController::class, 'createCV'])->middleware(['auth', 'chercheur'])->name('cvs');
Route::post('/cvs', [CvController::class, 'storeCV'])->name('cvs.store');
Route::get('/download', [CVController::class, 'downloadCv'])->middleware(['auth', 'chercheur'])->name('downloadCv');


Route::get('/about', [ChercheurController::class, 'about'])->middleware(['auth', 'chercheur'])->name('about');




Route::get('/archive', [HomeController::class, 'archive'])->middleware(['auth', 'admin'])->name('archive');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
