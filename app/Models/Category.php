<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['nome_categoria'];
    
    public function itens(): HasMany
    {
        return $this->hasMany(ItemCosplay::class, 'categoria_id');
    }
}