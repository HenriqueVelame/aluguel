<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('locacoes', function (Blueprint $table) {
        $table->id();
        $table->date('data_reserva')->nullable();
        $table->date('data_retirada')->nullable();
        $table->date('data_devolucao_prevista');
        $table->date('data_devolucao_real')->nullable();
        $table->decimal('valor_total', 10, 2)->default(0);
        $table->decimal('multa_atraso', 10, 2)->default(0);
        
        // Chave estrangeira para clientes
        $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
        
        $table->timestamps();
    });

    // Tabela Pivô (itens_do_aluguel) que você usa na Model
    Schema::create('itens_do_aluguel', function (Blueprint $table) {
        $table->id();
        $table->foreignId('locacao_id')->constrained('locacoes')->onDelete('cascade');
        $table->foreignId('item_id')->constrained('item_cosplays')->onDelete('cascade');
        $table->string('condicao_saida')->nullable();
        $table->string('condicao_retorno')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_do_aluguel'); // Primeiro, dropa a tabela pivô
        Schema::dropIfExists('locacoes'); // Depois, dropa a tabela principal
    }
};
