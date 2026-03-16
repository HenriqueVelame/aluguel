<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::table('locacoes', function (Blueprint $table) {
            // Adiciona a coluna status
            $table->string('status')->default('Ativo')->after('valor_total');
        });
    }

    public function down(): void
    {
        Schema::table('locacoes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
