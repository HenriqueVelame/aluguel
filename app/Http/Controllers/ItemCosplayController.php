<?php

namespace App\Http\Controllers;

use App\Models\ItemCosplay;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemCosplayController extends Controller
{
    public function index() {
        $cosplays = ItemCosplay::with('categoria')->get();
        return view('cosplays.index', compact('cosplays'));
    }

    public function create() {
        $categorias = Category::all(); 
        return view('cosplays.create', compact('categorias'));
    }

    public function store(Request $request) {
        // 1. Validação (Se falhar aqui, ele volta para a tela anterior com os erros)
        $validated = $request->validate([
            'nome_personagem' => 'required',
            'serie_origem'    => 'nullable',
            'tamanho'         => 'required',
            'categoria_id'    => 'required|exists:categorias,id',
            'valor_aluguel'   => 'required|numeric',
            'valor_caucao'    => 'required|numeric',
            'descricao_pecas' => 'required',
        ]);

        // 2. Criar com status padrão
        $validated['status'] = 'disponivel';

        ItemCosplay::create($validated);

        return redirect()->route('cosplays.index')->with('success', 'Salvo com sucesso!');
    }
}