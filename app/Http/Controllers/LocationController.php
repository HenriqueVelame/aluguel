<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ItemCosplay;
use App\Models\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Lista todas as locações.
     */
    public function index() 
    {
        // Carrega os relacionamentos definidos no Model Location
        // Usamos 'client' e 'itemCosplay' (nomes dos métodos no seu Model)
        $locacoes = Location::with(['client', 'itemCosplay'])->get();
        return view('locacoes.index', compact('locacoes'));
    }

    /**
     * Exibe o formulário de criação de locação.
     */
    public function create() 
    {
        // Buscamos todos os clientes e apenas os itens que estão disponíveis
        $clientes = Client::all();
        $itens = ItemCosplay::where('status', 'disponivel')->get();
        
        return view('locacoes.create', compact('clientes', 'itens'));
    }

    /**
     * Salva a locação.
     */
    public function store(Request $request) 
    {
        // 1. Validação dos dados
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'item_cosplay_id' => 'required|exists:item_cosplays,id',
            'data_locacao' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_locacao',
            'valor_total' => 'required|numeric',
        ]);

        // 2. Criar o registro na tabela 'locacoes'
        // Como sua migration já tem item_cosplay_id, não precisa de tabela pivô (attach)
        $locacao = Location::create([
            'client_id' => $request->client_id,
            'item_cosplay_id' => $request->item_cosplay_id,
            'data_locacao' => $request->data_locacao,
            'data_devolucao' => $request->data_devolucao,
            'valor_total' => $request->valor_total,
            'status' => 'Ativo',
        ]);

        // 3. Atualizar o status do item para 'alugada'
        $item = ItemCosplay::find($request->item_cosplay_id);
        if ($item) {
            $item->update(['status' => 'alugada']);
        }

        return redirect()->route('locacoes.index')->with('success', 'Aluguel realizado com sucesso!');
    }

    /**
     * Exibe os detalhes de uma locação específica.
     */
    public function show($id)
    {
        $locacao = Location::with(['client', 'itemCosplay'])->findOrFail($id);
        return view('locacoes.show', compact('locacao'));
    }
}