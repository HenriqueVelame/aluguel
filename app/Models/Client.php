<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco', 'medidas_corpo'];

    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}
