<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCosplay extends Model
{
    use HasFactory;

    protected $table = 'item_cosplays'; // Garante que a tabela é a correta

    protected $fillable = [
        'nome_personagem',
        'serie_origem',
        'tamanho',
        'descricao_pecas',
        'valor_aluguel',
        'valor_caucao',
        'status',
        'categoria_id',
        'foto'
    ];

    public function categoria() {
        return $this->belongsTo(Category::class, 'categoria_id');
    }
    /**
    * Relacionamento: Um item de cosplay pode estar presente em várias locações (histórico).
    */
    public function locacoes()
    {
        // Usamos a mesma tabela pivô 'itens_do_aluguel'
        return $this->belongsToMany(Location::class, 'itens_do_aluguel', 'item_cosplay_id', 'locacao_id');
    }
}