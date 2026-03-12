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
        // Carrega os relacionamentos para evitar o erro de 'property non-object' na view
        $locacoes = Location::with(['client', 'itemCosplay'])->get();
        return view('locacoes.index', compact('locacoes'));
    }

    /**
     * Exibe o formulário de criação (Necessário para carregar Clientes e Cosplays).
     */
    public function create() 
    {
        $clientes = Client::all();
        // Só mostra cosplays que estão 'disponivel'
        $cosplays = ItemCosplay::where('status', 'disponivel')->get();
        
        return view('locacoes.create', compact('clientes', 'cosplays'));
    }

    /**
     * Salva a nova locação no banco.
     */
    public function store(Request $request) 
    {
        // 1. Validação robusta
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'item_cosplay_id' => 'required|exists:item_cosplays,id',
            'data_locacao' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_locacao',
            'valor_total' => 'required|numeric'
        ]);

        // 2. Cria a locação
        $locacao = Location::create([
            'client_id' => $request->client_id,
            'item_cosplay_id' => $request->item_cosplay_id,
            'data_locacao' => $request->data_locacao,
            'data_devolucao' => $request->data_devolucao,
            'valor_total' => $request->valor_total,
            'status' => 'Ativo',
            'multa_atraso' => 0 // Inicia zerado
        ]);

        // 3. Atualiza o status do Cosplay para 'alugada'
        $item = ItemCosplay::find($request->item_cosplay_id);
        if ($item) {
            $item->update(['status' => 'alugada']);
        }

        return redirect()->route('locacoes.index')->with('success', 'Aluguel realizado com sucesso!');
    }

    /**
     * Método para devolver o item e calcular a multa.
     */
    public function devolver($id) 
    {
        $locacao = Location::findOrFail($id);
        
        // Usa a função que criamos dentro do Model Location
        $locacao->finalizarLocacao(now()->format('Y-m-d'));

        // Libera o cosplay novamente
        $locacao->itemCosplay->update(['status' => 'disponivel']);

        return redirect()->back()->with('success', 'Item devolvido com sucesso!');
    }
}