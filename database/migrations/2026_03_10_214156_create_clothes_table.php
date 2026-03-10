<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('item_cosplays', function (Blueprint $table) {
        $table->id();
        $table->string('nome_personagem');
        $table->string('serie_origem')->nullable();
        $table->string('tamanho', 5);
        $table->text('descricao_pecas');
        $table->decimal('valor_aluguel', 8, 2);
        $table->decimal('valor_caucao', 8, 2);
        $table->enum('status', ['disponivel', 'alugada', 'manutencao'])->default('disponivel');
        
        $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
        
        $table->timestamps();
    });
}
    
    public function down(): void
    {
        Schema::dropIfExists('clothes');
    }
};
