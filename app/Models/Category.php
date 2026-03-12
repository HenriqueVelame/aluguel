<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Adicione esta linha para corrigir o erro:
    protected $table = 'categorias';

    protected $fillable = ['nome_categoria'];

    public function itemCosplays()
    {
        return $this->hasMany(ItemCosplay::class, 'categoria_id');
    }
}