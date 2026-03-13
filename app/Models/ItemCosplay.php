<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCosplay extends Model
{
    use HasFactory;

    protected $table = 'clothes';

    protected $fillable = [
        'nome',
        'tamanho',
        'categoria_id',
        'descricao',
        'valor_locacao'
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
}