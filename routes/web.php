<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CentroController;
use App\Http\Controllers\Admin\GradoController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\Admin\PatrocinadorController;
use App\Http\Controllers\ProfileController;

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
})->name('home');

Route::post('/inscripcion', [InscripcionesController::class, 'store'])->name('inscripcion');

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('categorias', CategoriaController::class);
    Route::resource('centros', CentroController::class);
    Route::resource('grados', GradoController::class);
    Route::resource('patrocinadores', PatrocinadorController::class)
        ->parameters(['patrocinadores' => 'patrocinador']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
