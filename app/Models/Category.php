<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Define o nome correto da tabela (evita que o Laravel procure 'categories')
    protected $table = 'categorias';

    // Permite o preenchimento em massa do campo nome_categoria
    protected $fillable = ['nome_categoria'];
    
    /**
     * Relacionamento: Uma categoria possui muitos itens de cosplay
     */
    public function itens(): HasMany
    {
        return $this->hasMany(ItemCosplay::class, 'categoria_id');
    }
}