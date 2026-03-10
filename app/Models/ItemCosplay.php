<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemCosplay extends Model
{
    protected $fillable = [
        'nome_personagem',
        'serie_origem',
        'tamanho',
        'descricao_pecas',
        'valor_aluguel',
        'valor_caucao',
        'status',
        'categoria_id'
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}