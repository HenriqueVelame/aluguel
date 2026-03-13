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
        'multa'
    ];

    public function cliente()
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }
}