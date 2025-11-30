<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Связываем с существующей таблицей users
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Полностью удаляем связь и колонку
            $table->dropForeign(['creator_id']);
            $table->dropColumn('creator_id');
        });
    }
};