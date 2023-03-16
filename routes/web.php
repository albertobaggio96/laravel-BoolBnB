<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PropertyController as PropertyController;
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



//TODO IN RF1 L'UTENTE NON DEVE AVERE LA POSSIBILITA' DI CANCELLARE I DATI INSERITI IN FASE DI REGISTRAZIONE


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group( function(){
    Route::resource('/properties', PropertyController::class);
});

require __DIR__.'/auth.php';
