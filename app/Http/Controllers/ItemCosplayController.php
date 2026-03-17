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
    
    

    public function show(string $id) {
        $cosplay = ItemCosplay::with('categoria')->findOrFail($id);
        return view('cosplays.show', compact('cosplay'));
    }

    // ✅ exibe o formulário de edição
    public function edit(string $id) {
        $cosplay    = ItemCosplay::findOrFail($id);
        $categorias = Category::all();
        return view('cosplays.edit', compact('cosplay', 'categorias'));
    }

    // ✅ salva as alterações
    public function update(Request $request, string $id) {
        $cosplay = ItemCosplay::findOrFail($id);

        $validated = $request->validate([
            'nome_personagem' => 'required',
            'serie_origem'    => 'nullable',
            'tamanho'         => 'required',
            'categoria_id'    => 'required|exists:categorias,id',
            'valor_aluguel'   => 'required|numeric',
            'valor_caucao'    => 'required|numeric',
            'descricao_pecas' => 'required',
            'status'          => 'required|in:disponivel,alugado,manutencao',
        ]);

        $cosplay->update($validated);

        return redirect()->route('cosplays.index')->with('success', 'Atualizado com sucesso!');
    }

    // ✅ deleta o item
    public function destroy(string $id) {
        $cosplay = ItemCosplay::findOrFail($id);
        $cosplay->delete();

        return redirect()->route('cosplays.index')->with('success', 'Item excluído com sucesso!');
    }

}