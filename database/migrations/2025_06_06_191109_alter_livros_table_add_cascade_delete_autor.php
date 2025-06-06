<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropForeign(['autor_id']);
            $table->foreign('autor_id')
                  ->references('id')->on('autores')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->dropForeign(['autor_id']);

            $table->foreign('autor_id')
                  ->references('id')->on('autores');
        });
    }
};
