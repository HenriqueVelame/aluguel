<?php

namespace App\Http\Controllers;

use App\Models\ItemCosplay;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemCosplayController extends Controller
{
    public function index()
    {
        $cosplays = ItemCosplay::with('categoria')->get();
        return view('cosplays.index', compact('cosplays'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('cosplays.create', compact('categorias'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nome_personagem' => 'required',
            'serie_origem'    => 'nullable',
            'tamanho'         => 'required|max:10', 
            'categoria_id'    => 'required|exists:categorias,id',
            'valor_aluguel'   => 'required|numeric',
            'valor_caucao'    => 'required|numeric',
            'descricao_pecas' => 'required',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['status'] = 'disponivel';

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('cosplays', 'public');
            $validated['foto'] = $path;
        }

        ItemCosplay::create($validated);

        return redirect()->route('cosplays.index')->with('success', 'Salvo com sucesso!');
    }

    public function show(string $id)
    {
        $cosplay = ItemCosplay::with('categoria')->findOrFail($id);
        return view('cosplays.show', compact('cosplay'));
    }

    public function edit(string $id)
    {
        $cosplay = ItemCosplay::findOrFail($id);
        $categorias = Category::all();
        return view('cosplays.edit', compact('cosplay', 'categorias'));
    }

    public function update(Request $request, string $id) 
    {
        $cosplay = ItemCosplay::findOrFail($id);

        $validated = $request->validate([
            'nome_personagem' => 'required|string|max:255',
            'tamanho'         => 'required|max:10',
            'categoria_id'    => 'required',
            'valor_aluguel'   => 'required|numeric',
            'status'          => 'required',
            'serie_origem'    => 'nullable',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($cosplay->foto) {
                Storage::disk('public')->delete($cosplay->foto);
            }
            $path = $request->file('foto')->store('cosplays', 'public');
            $validated['foto'] = $path;
        }

        $cosplay->update($validated);

        return redirect()->route('cosplays.index')->with('success', 'Atualizado!');
    }

    public function destroy(string $id)
    {
        $cosplay = ItemCosplay::findOrFail($id);
        
        if ($cosplay->foto) {
            Storage::disk('public')->delete($cosplay->foto);
        }
        
        $cosplay->delete();

        return redirect()->route('cosplays.index')->with('success', 'Item excluído com sucesso!');
    }
}