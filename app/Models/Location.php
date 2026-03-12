<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Location extends Model
{
    protected $table = 'locacoes';

    protected $fillable = [
        'client_id', 
        'item_cosplay_id', 
        'data_locacao', 
        'data_devolucao', 
        'valor_total', 
        'status',
        'multa_atraso',
        'data_devolucao_real'
    ];

    public function client() 
    { 
        // Referenciando o Model Client
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function itemCosplay() 
    {
        return $this->belongsTo(ItemCosplay::class, 'item_cosplay_id');
    }

    public function finalizarLocacao($dataRetorno)
    {
        $this->data_devolucao_real = $dataRetorno;
        
        $prevista = Carbon::parse($this->data_devolucao);
        $real = Carbon::parse($dataRetorno);

        if ($real->gt($prevista)) {
            $diasAtraso = $real->diffInDays($prevista);
            $this->multa_atraso = $diasAtraso * 15.00;
        } else {
            $this->multa_atraso = 0;
        }
        
        $this->status = 'Devolvido';
        $this->save();
    }
}