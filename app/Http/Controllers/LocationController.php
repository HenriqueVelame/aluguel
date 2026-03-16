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
        // Mudamos 'itemCosplay' para 'itens', que foi o nome que criamos no Model
        $locacoes = Location::with(['cliente', 'itens'])->get();
        return view('locacoes.index', compact('locacoes'));
    }

    /**
     * EXIBE O FORMULÁRIO DE CRIAÇÃO (O que estava faltando)
     */
    public function create() 
    {
        // Buscamos todos os clientes e apenas os itens que estão disponíveis
        $clientes = Client::all();
        $cosplays = ItemCosplay::where('status', 'disponivel')->get();
        
        return view('locacoes.create', compact('clientes', 'cosplays'));
    }

    /**
     * SALVA A LOCAÇÃO NO BANCO
     */
    public function store(Request $request) 
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'item_cosplay_id' => 'required|exists:item_cosplays,id',
            'data_locacao' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_locacao',
            'valor_total' => 'required|numeric',
        ]);

        // 1. Criar a locação (sem o item_cosplay_id, pois ele não existe nesta tabela)
        $locacao = Location::create([
            'cliente_id'              => $request->client_id,
            'data_reserva'            => now(),
            'data_retirada'           => $request->data_locacao,
            'data_devolucao_prevista' => $request->data_devolucao,
            'valor_total'             => $request->valor_total,
            'status'                  => 'Ativo',
        ]);

        // 2. Vincular o item na tabela 'itens_do_aluguel'
        // Isso usa a tabela pivô que você criou na migration
        \DB::table('itens_do_aluguel')->insert([
            'locacao_id' => $locacao->id,
            'item_cosplay_id' => $request->item_cosplay_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Atualizar o status do item para 'alugada'
        ItemCosplay::where('id', $request->item_cosplay_id)->update(['status' => 'alugada']);

        return redirect()->route('locacoes.index')->with('success', 'Aluguel realizado com sucesso!');
    }

    public function devolver($id)
    {
        // 1. Encontra a locação com os itens vinculados
        $locacao = Location::with('itens')->findOrFail($id);

        // 2. Atualiza os dados da locação
        $locacao->update([
            'status' => 'Finalizado',
            'data_devolucao_real' => now()
        ]);

        // 3. Libera cada item da locação para que fiquem 'disponivel' novamente
        foreach ($locacao->itens as $item) {
            $item->update(['status' => 'disponivel']);
        }

        return redirect()->route('locacoes.index')->with('success', 'Devolução confirmada! Os trajes já estão disponíveis para novos aluguéis.');
    }

    /**
    * Exibe os detalhes de uma locação específica.
    */

    public function edit($id)
    {
        $locacao = Location::with('itens')->findOrFail($id);
        $clientes = Client::all();
        // Pegamos os itens que já estão nesta locação MAIS os que estão disponíveis
        $cosplays = ItemCosplay::where('status', 'disponivel')
                    ->orWhereHas('locacoes', function($q) use ($id) {
                        $q->where('locacao_id', $id);
                    })->get();

        return view('locacoes.edit', compact('locacao', 'clientes', 'cosplays'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente_id' => 'required',
            'data_retirada' => 'required|date',
            'data_devolucao_prevista' => 'required|date',
            'valor_total' => 'required|numeric',
        ]);

        $locacao = Location::findOrFail($id);
        
        // Atualiza os dados básicos
        $locacao->update([
            'cliente_id' => $request->cliente_id,
            'data_retirada' => $request->data_retirada,
            'data_devolucao_prevista' => $request->data_devolucao_prevista,
            'valor_total' => $request->valor_total,
            'status' => $request->status,
        ]);

        // Se você mudou o item no formulário, sincroniza na tabela pivô
        if ($request->has('item_cosplay_id')) {
            $locacao->itens()->sync([$request->item_cosplay_id]);
        }

        return redirect()->route('locacoes.index')->with('success', 'Locação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $locacao = Location::findOrFail($id);

        // 1. Antes de deletar, liberamos os itens para ficarem 'disponíveis' novamente
        foreach ($locacao->itens as $item) {
            $item->update(['status' => 'disponivel']);
        }

        // 2. Removemos os vínculos na tabela pivô (itens_do_aluguel)
        $locacao->itens()->detach();

        // 3. Deletamos a locação
        $locacao->delete();

        return redirect()->route('locacoes.index')->with('success', 'Locação excluída e itens liberados no estoque!');
    }

    public function show($id)
    {
        // Buscamos a locação com o cliente e os itens vinculados
        $locacao = Location::with(['cliente', 'itens'])->findOrFail($id);

        return view('locacoes.show', compact('locacao'));
    }
} 