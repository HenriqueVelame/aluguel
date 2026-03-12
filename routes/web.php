<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemCosplayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

// --- ROTAS PÚBLICAS ---
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/registrar', [AuthController::class, 'showRegister'])->name('register');
Route::post('/registrar', [AuthController::class, 'register'])->name('register.post');

// --- ROTAS PROTEGIDAS (LOGADOS) ---
Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    // CRUD de Clientes
    Route::resource('clientes', ClientController::class);

    // CRUD de Cosplays (Usando ItemCosplayController para gerenciar o catálogo)
    Route::resource('cosplays', ItemCosplayController::class);

    // CRUD de Locações (Organizado para usar o Resource + a rota de devolver)
    Route::post('/locacoes/{id}/devolver', [LocationController::class, 'devolver'])->name('locacoes.devolver');
    Route::resource('locacoes', LocationController::class);

    // CRUD de Categorias
    Route::resource('categorias', CategoryController::class);
});