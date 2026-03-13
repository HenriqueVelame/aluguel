<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request) {
        $request->validate(['nome_categoria' => 'required|unique:categorias']);
        Category::create($request->all());
        return redirect()->back()->with('success', 'Categoria criada!');
    }

    public function edit(Category $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria)
    {
        $request->validate([
            'nome_categoria' => 'required|unique:categorias,nome_categoria,' . $categoria->id
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria atualizada!');
    }

    public function destroy(Category $categoria)
    {
        // Verifica se existem itens vinculados a esta categoria antes de deletar
        if ($categoria->itens()->count() > 0) {
            return redirect()->route('categorias.index')
                             ->with('error', 'Não é possível excluir: existem cosplays nesta categoria!');
        }

        $categoria->delete();
        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria removida.');
    }
}