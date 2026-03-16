<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locacoes';

    protected $fillable = [
        'cliente_id',
        'data_reserva',
        'data_retirada',
        'data_devolucao_prevista',
        'data_devolucao_real',
        'valor_total',
        'status',
        'multa'
    ];

    // Relacionamento com o Cliente
    public function cliente()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }

    // Relacionamento com os Itens (Cosplays) via tabela pivô
    public function itens()
    {
        return $this->belongsToMany(ItemCosplay::class, 'itens_do_aluguel', 'locacao_id', 'item_cosplay_id');
    }
}