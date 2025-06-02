<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CoordonneeController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PubliciteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PalmaresController;
use App\Http\Controllers\palmaresPublicController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\web\ActualitesController;
=======
use App\Http\Controllers\web\PlayersController;

>>>>>>> dc17c87b3a3953e325f9092203a382167c70c8fc

Route::get('/legendes', function () {
    return view('legendes');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('/presentation', 'presentation')->name('presentation');
Route::get('/effectif', [PlayerController::class, 'index'])->name('web.effectif');
Route::get('/palmares', [palmaresPublicController::class, 'index'])->name('palmaresPublic.index');
Route::get('/effectif', [PlayersController::class, 'index'])->name('web.effectif');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/actualite', ActualiteController::class);
    Route::resource('admin/contact', ContactController::class);
    Route::resource('admin/coordonnee', CoordonneeController::class);
    Route::resource('admin/galerie', GalerieController::class);
    Route::resource('admin/partenaire', PartenaireController::class);
    Route::resource('admin/players', PlayerController::class);
    Route::resource('admin/publicite', PubliciteController::class);
    Route::resource('admin/user', UserController::class);
    Route::resource('admin/video', VideoController::class);
    Route::resource('admin/palmares', PalmaresController::class);
});

Route::get('/actualites', [ActualitesController::class, 'index'])->name('public.actualites');



require __DIR__.'/auth.php';

