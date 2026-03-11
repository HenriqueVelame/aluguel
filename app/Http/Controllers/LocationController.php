<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\ItemCosplay;
use App\Models\Client;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index() {
        $locacoes = Location::with('cliente')->get();
        return view('locacoes.index', compact('locacoes'));
    }

    public function store(Request $request) {
        $locacao = Location::create($request->all());

        $item = ItemCosplay::find($request->item_id);
        $item->update(['status' => 'alugada']);
        
        $locacao->itens()->attach($item->id, ['condicao_saida' => 'Ótimo estado']);

        return redirect()->route('locacoes.index')->with('success', 'Aluguel realizado!');
    }
}
