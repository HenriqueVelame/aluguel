<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Se o seu model Location usa a tabela 'locacoes', use este nome aqui:
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();
            // CHAVE ESTRANGEIRA DO CLIENTE (A tabela 'clientes' precisa existir!)
            $table->foreignId('client_id')->constrained('clientes')->onDelete('cascade');
            // CHAVE ESTRANGEIRA DO COSPLAY
            $table->foreignId('item_cosplay_id')->constrained('item_cosplays')->onDelete('cascade');
            $table->decimal('multa_atraso', 10, 2)->default(0);
            $table->date('data_devolucao_real')->nullable();
            $table->date('data_locacao'); // Ajuste para bater com o Controller
            $table->date('data_devolucao');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('status')->default('Ativo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locacoes');
    }
};