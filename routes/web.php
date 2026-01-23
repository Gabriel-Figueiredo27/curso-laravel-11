<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//ROTAS DE USERS

Route::get('/usuarios', [UserController::class, 'index']) ->name('users.index');

Route::get('/usuarios/cadastro', [UserController::class, 'create']) ->name('users.create');

Route::post('/usuarios/cadastro', [UserController::class, 'store']) ->name('users.store');

Route::post('/usuarios/editar', [UserController::class, 'edit']) ->name('users.edit');

Route::get('/usuarios/mostrar/{id}', [UserController::class, 'show'])->name('users.show');

Route::post('/usuarios/editar/{id}', [UserController::class, 'update'])->name('users.update');

//FIM


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
