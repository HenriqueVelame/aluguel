<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemCosplayController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Rotas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


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

    /*
    |--------------------------------------------------------------------------
    | CRUDs
    |--------------------------------------------------------------------------
    */

    Route::resource('clientes', ClientController::class);

    Route::resource('cosplays', ItemCosplayController::class);

    Route::resource('locacoes', LocationController::class);

});


/*
|--------------------------------------------------------------------------
| Rotas somente ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::resource('categorias', CategoryController::class);

});