<?php

use Illuminate\Support\Facades\Route;

// 1. Rota para a página inicial (Redireciona para a lista)
Route::get('/', function () {
    return redirect()->route('cosplays.index');
});

// 2. Listagem (Página principal)
Route::get('/cosplays', function () {
    return view('cosplays.index');
})->name('cosplays.index');

// 3. Criar Novo (Formulário vazio)
Route::get('/cosplays/novo', function () {
    return view('cosplays.create');
})->name('cosplays.create');

// 4. Editar (Formulário preenchido)
Route::get('/cosplays/editar', function () {
    return view('cosplays.edit');
})->name('cosplays.edit');

// 5. Ver Detalhes (Página com todas as informações) --- FALTA ESSA!
Route::get('/cosplays/detalhes', function () {
    return view('cosplays.show');
})->name('cosplays.show');

// 6. Rota de Deletar (Ação no botão da lista) --- FALTA ESSA!
// Nota: No futuro o Pessoa A vai mudar para Route::delete
Route::get('/cosplays/deletar', function () {
    return "Simulando exclusão...";
})->name('cosplays.destroy');