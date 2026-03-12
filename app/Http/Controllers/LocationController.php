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
     * Lista todas as locações com os dados dos clientes.
     */
    public function index() 
    {
        $locacoes = Location::with('cliente')->get();
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
     * Salva a locação e vincula o item na tabela pivô.
     */
    public function store(Request $request) 
    {
        // 1. Criar o registro principal na tabela 'locacoes'
        $locacao = Location::create($request->all());

        // 2. Buscar o item selecionado
        $item = ItemCosplay::find($request->item_id);
        
        if ($item) {
            // 3. Atualizar o status do item para 'alugada'
            $item->update(['status' => 'alugada']);
            
            // 4. Vincular na tabela pivô 'itens_do_aluguel' com dados extras
            $locacao->itens()->attach($item->id, [
                'condicao_saida' => 'Ótimo estado',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('locacoes.index')->with('success', 'Aluguel realizado com sucesso!');
    }

    /**
     * Exibe os detalhes de uma locação específica.
     */
    public function show($id)
    {
        // Carrega a locação com o cliente e os itens vinculados
        $locacao = Location::with(['cliente', 'itens'])->findOrFail($id);
        return view('locacoes.show', compact('locacao'));
    }
}