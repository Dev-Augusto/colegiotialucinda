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
        Schema::create('ensino_conteudos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ensino');
            $table->string('image');
            $table->string('title');
            $table->text('conteudo');
            $table->integer('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ensino_conteudos');
    }
};
