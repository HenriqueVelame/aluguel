<?php

namespace App\Models;
use App\Models\Locacao;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco', 'medidas_corpo'];

    public function locacoes()
    {
        return $this->hasMany(Locacao::class);
    }
}
