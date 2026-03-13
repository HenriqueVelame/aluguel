<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $busca = $request->input('busca');

        $clientes = Client::where('nome','like',"%$busca%")
            ->orWhere('cpf','like',"%$busca%")
            ->paginate(10);

        return view('clientes.index', compact('clientes','busca'));
    }


    public function create()
    {
        return view('clientes.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes',
            'email' => 'required|email',
            'telefone' => 'required'
        ]);

        Client::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success','Cliente cadastrado com sucesso!');
    }


    public function edit($id)
    {
        $cliente = Client::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }


    public function update(Request $request, $id)
    {

        $cliente = Client::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes,cpf,' . $id,
            'email' => 'required|email',
            'telefone' => 'required'
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success','Cliente atualizado com sucesso!');
    }


    public function destroy($id)
    {

        if(Auth::user()->role !== 'admin'){
            return redirect()->route('clientes.index')
            ->with('error','Apenas administradores podem excluir.');
        }

        $cliente = Client::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
        ->with('success','Cliente removido com sucesso!');
    }

}