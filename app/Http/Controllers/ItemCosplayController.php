<?php

namespace App\Http\Controllers;

use App\Models\ItemCosplay;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemCosplayController extends Controller
{
    public function index() {
        $itens = ItemCosplay::with('categoria')->get();
        return view('cosplays.index', compact('itens'));
    }

    public function create() {
        $categorias = Categoria::all();
        return view('cosplays.create', compact('categorias'));
    }

    public function store(Request $request) {
        $dados = $request->validate([
            'nome_personagem' => 'required',
            'valor_aluguel' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'tamanho' => 'required'
        ]);

        ItemCosplay::create($request->all());
        return redirect()->route('cosplays.index')->with('success', 'Cosplay cadastrado com sucesso!');
    }

    public function destroy($id) {
        ItemCosplay::findOrFail($id)->delete();
        return redirect()->route('cosplays.index')->with('success', 'Item removido!');
    }
}
