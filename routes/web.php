<?php

use Illuminate\Support\Facades\Route;

// Rota para a página inicial do catálogo (que você criou)
Route::get('/cosplays', function () {
    return view('cosplays.index'); // Certifique-se que o arquivo está em resources/views/cosplays/index.blade.php
})->name('cosplays.index');

// Rota para o formulário de cadastro (que você vai fazer)
Route::get('/cosplays/novo', function () {
    return view('cosplays.create');
})->name('cosplays.create');

Route::get('/', function () {
    return view('welcome');
});
