<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->foreignId('item_cosplay_id')->constrained('item_cosplays');
        $table->date('data_retirada');
        $table->date('data_devolucao');
        $table->timestamps();
    });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
