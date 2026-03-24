<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('password_reset_tokens', function (Blueprint $table) {
        $table->string('code')->after('email'); 
        $table->integer('attempts')->default(0)->after('code');
        $table->timestamp('blocked_until')->nullable()->after('attempts');
        $table->timestamp('expires_at')->nullable()->after('blocked_until');
    });
}

public function down(): void
{
    Schema::table('password_reset_tokens', function (Blueprint $table) {
        $table->dropColumn(['code', 'attempts', 'blocked_until', 'expires_at']);
    });
}
     
};
