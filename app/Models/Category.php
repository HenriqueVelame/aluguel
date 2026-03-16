<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nome_categoria' // Ajustado de 'nome' para 'nome_categoria'
    ];

    public function itens()
    {
        return $this->hasMany(ItemCosplay::class, 'categoria_id');
    }
}