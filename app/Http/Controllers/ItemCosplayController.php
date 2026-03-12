<?php

namespace App\Http\Controllers;

use App\Models\ItemCosplay;
use App\Models\Category; // Certifique-se que o Model é Category ou Categoria
use Illuminate\Http\Request;

class ItemCosplayController extends Controller
{
    public function index() {
        // 1. Mudamos de $itens para $cosplays para bater com o seu @forelse($cosplays...)
        $cosplays = ItemCosplay::with('categoria')->get();
        return view('cosplays.index', compact('cosplays'));
    }

    public function create() {
        // 2. Corrigido: Se o Model importado lá em cima é Category, use Category. 
        // Se no seu projeto for Categoria, mude o 'use' lá no topo.
        $categorias = \App\Models\Category::all(); 
        return view('cosplays.create', compact('categorias'));
    }

    public function store(Request $request) {
        $request->validate([
            'nome_personagem' => 'required',
            'valor_aluguel' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'tamanho' => 'required'
        ]);

        // 3. Adicionado o status padrão para garantir que ele apareça no catálogo
        $dados = $request->all();
        if (!isset($dados['status'])) {
            $dados['status'] = 'disponivel';
        }

        ItemCosplay::create($dados);
        return redirect()->route('cosplays.index')->with('success', 'Cosplay cadastrado com sucesso!');
    }

    public function show($id) {
        $cosplay = ItemCosplay::findOrFail($id);
        return view('cosplays.show', compact('cosplay'));
    }

    public function destroy($id) {
        ItemCosplay::findOrFail($id)->delete();
        return redirect()->route('cosplays.index')->with('success', 'Item removido!');
    }
}