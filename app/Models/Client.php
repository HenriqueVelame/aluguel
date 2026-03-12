<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome', 
        'cpf', 
        'email', 
        'telefone', 
        'endereco', 
        'medidas_corpo'
    ];

    public function locacoes()
    {
        // Como o seu Model se chama Location, o relacionamento deve ser com Location::class
        return $this->hasMany(Location::class, 'client_id');
    }
}