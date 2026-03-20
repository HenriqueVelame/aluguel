<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locacoes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cliente_id');
            $table->string('status')->default('Ativo');
            $table->date('data_reserva');
            $table->date('data_retirada');
            $table->date('data_devolucao_prevista');
            $table->date('data_devolucao_real')->nullable();

            $table->decimal('valor_total', 10, 2)->default(0);
            $table->decimal('multa', 10, 2)->default(0);

            $table->timestamps();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');
        });

        Schema::create('itens_do_aluguel', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('locacao_id');
            $table->unsignedBigInteger('item_cosplay_id');

            $table->timestamps();

            $table->foreign('locacao_id')
                ->references('id')
                ->on('locacoes')
                ->onDelete('cascade');

            // SEM foreign key para clothes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens_do_aluguel');
        Schema::dropIfExists('locacoes');
    }
};