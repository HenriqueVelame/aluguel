<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // Lista todos os clientes (Ambos acessam)
    public function index()
    {
        $clientes = Client::all();
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de cadastro (Ambos acessam)
    public function create()
    {
        return view('clientes.create');
    }

    // Salva o cliente no banco (Ambos acessam)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:clientes,cpf',
            'email' => 'required|email',
            'telefone' => 'required',
            'medidas_corpo' => 'nullable|string'
        ]);

        Client::create($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Exibe o formulário de edição (SÓ ADMIN)
    public function edit(Client $cliente)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('clientes.index')
                             ->with('error', 'Acesso negado! Apenas administradores podem editar clientes.');
        }

        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza os dados do cliente (SÓ ADMIN)
    public function update(Request $request, Client $cliente)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('clientes.index')
                             ->with('error', 'Ação não permitida.');
        }

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|unique:clientes,cpf,' . $cliente->id,
            'email' => 'required|email',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Dados do cliente atualizados!');
    }

    // Remove o cliente (SÓ ADMIN)
    public function destroy(Client $cliente)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('clientes.index')
                             ->with('error', 'Acesso negado! Apenas administradores podem remover clientes.');
        }

        $cliente->delete();
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente removido do sistema.');
    }
}