<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemCosplayController;
use App\Http\Controllers\LocationController;


Route::resource('locacoes', LocationController::class);
Route::get('/', function () {
    return redirect()->route('cosplays.index');
});

Route::resource('clientes', ClientController::class);
Route::resource('categorias', CategoryController::class);
Route::resource('cosplays', ItemCosplayController::class);
Route::resource('locacoes', LocationController::class);