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
        Schema::create('noticia_coments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_noticia');
            $table->foreignId('id_estudante');
            $table->string('name',40);
            $table->text('texto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticia_coments');
    }
};
