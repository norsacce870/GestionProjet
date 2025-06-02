<?php
use App\Http\Controllers\web\PlayersController;
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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\palmaresPublicController;



Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::view('/presentation', 'presentation')->name('presentation');


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
    Route::get('/palmaresPublic', [palmaresPublicController::class, 'index'])->name('palmaresPublic.index');

    Route::get('/effectif', [PlayersController::class, 'index'])->name('web.effectif');
    Route::get('/effectif/{id}', [PlayersController::class, 'show'])->name('web.showEffectif');



});



require __DIR__.'/auth.php';

