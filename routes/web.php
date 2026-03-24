<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemCosplayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Registro (Adicionadas para corrigir o erro 500)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


// Esqueci minha senha
Route::get('/recovery', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/recovery', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');

Route::get('/recovery/reset/{email}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/recovery/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Rotas protegidas (precisa estar logado)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/locacoes/{id}/devolver', [LocationController::class, 'devolver'])->name('locacoes.devolver');
    Route::get('/locacoes/{id}/edit', [LocationController::class, 'edit'])->name('locacoes.edit');
    Route::put('/locacoes/{id}', [LocationController::class, 'update'])->name('locacoes.update');
    Route::delete('/locacoes/{id}', [App\Http\Controllers\LocationController::class, 'destroy'])->name('locacoes.destroy');
    /*
    |--------------------------------------------------------------------------
    | CRUDs
    |--------------------------------------------------------------------------
    */
    

    Route::resource('clientes', ClientController::class);

    Route::resource('cosplays', ItemCosplayController::class);

    Route::resource('locacoes', LocationController::class);
    
    Route::resource('categorias', CategoryController::class);

});