<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Location extends Model
{
    // Define o nome da tabela no banco (evita o erro 'locations' not found)
    protected $table = 'locacoes';

    protected $fillable = [
        'data_reserva', 
        'data_retirada', 
        'data_devolucao_prevista', 
        'data_devolucao_real', 
        'valor_total', 
        'multa_atraso', 
        'cliente_id'
    ];

    /**
     * Relacionamento com o Cliente
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'cliente_id');
    }

    /**
     * Relacionamento muitos-para-muitos com Itens de Cosplay
     * Note que usamos a tabela pivô 'itens_do_aluguel' conforme seu código
     */
    public function itens(): BelongsToMany
    {
        return $this->belongsToMany(ItemCosplay::class, 'itens_do_aluguel', 'locacao_id', 'item_id')
                    ->withPivot('condicao_saida', 'condicao_retorno')
                    ->withTimestamps();
    }

    /**
     * Lógica para finalizar a locação e calcular multa
     */
    public function finalizarLocacao($dataRetorno)
    {
        $this->data_devolucao_real = $dataRetorno;
        $prevista = Carbon::parse($this->data_devolucao_prevista);
        $real = Carbon::parse($dataRetorno);

        if ($real->gt($prevista)) {
            $diasAtraso = $real->diffInDays($prevista);
            // Aplica multa de R$ 15,00 por dia de atraso
            $this->multa_atraso = $diasAtraso * 15.00;
        } else {
            $this->multa_atraso = 0;
        }

        $this->save();
    }
}