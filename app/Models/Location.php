<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Location extends Model
{
    protected $fillable = [
        'data_reserva', 'data_retirada', 'data_devolucao_prevista', 
        'data_devolucao_real', 'valor_total', 'multa_atraso', 'cliente_id'
    ];

    public function cliente() { return $this->belongsTo(Client::class); }

    public function itens()
    {
        return $this->belongsToMany(ItemCosplay::class, 'itens_do_aluguel', 'locacao_id', 'item_id')
                    ->withPivot('condicao_saida', 'condicao_retorno');
    }

    public function finalizarLocacao($dataRetorno)
    {
        $this->data_devolucao_real = $dataRetorno;
        $prevista = Carbon::parse($this->data_devolucao_prevista);
        $real = Carbon::parse($dataRetorno);

        if ($real->gt($prevista)) {
            $diasAtraso = $real->diffInDays($prevista);
            $this->multa_atraso = $diasAtraso * 15.00;
        }
        $this->save();
    }
}
