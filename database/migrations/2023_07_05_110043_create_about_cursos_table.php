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
        Schema::create('about_cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_curso');
            $table->string('image_professores');
            $table->text('content_professores');
            $table->string('image_estudantes');
            $table->text('content_estudantes');
            $table->string('image_estagios');
            $table->text('content_estagios');
            $table->string('image_actividade');
            $table->text('content_actividade');
            $table->integer('matriculados');
            $table->integer('formados');
            $table->integer('vagas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_cursos');
    }
};
