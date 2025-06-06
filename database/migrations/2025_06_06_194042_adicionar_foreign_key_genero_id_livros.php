<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->foreign('genero_id')
                  ->references('id')
                  ->on('generos')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropForeign(['genero_id']);
        });
    }
};
