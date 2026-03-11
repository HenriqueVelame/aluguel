<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Lista todos os clientes
    public function index()
    {
        $clientes = Client::all();
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('clientes.create');
    }

    // Salva o cliente no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf',
            'email' => 'required|email',
            'telefone' => 'required',
            'medidas_corpo' => 'nullable|string' // Campo do seu diagrama
        ]);

        Client::create($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit(Client $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza os dados do cliente
    public function update(Request $request, Client $cliente)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes,cpf,' . $cliente->id,
            'email' => 'required|email',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Dados do cliente atualizados!');
    }

    // Remove o cliente
    public function destroy(Client $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente removido do sistema.');
    }
}