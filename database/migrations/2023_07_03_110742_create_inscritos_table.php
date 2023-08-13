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
        Schema::create('inscritos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fillia');
            $table->foreignId('id_curso');
            $table->string('name',50);
            $table->date('nascimento');
            $table->string('sexo',1);
            $table->string('nacionalidade',15);
            $table->string('id_number',35);
            $table->string('image_bi');
            $table->string('image_passe');
            $table->string('certificado');
            $table->integer('classe');
            $table->string('name_encarregado',50);
            $table->integer('telefone_encarregado');
            $table->string('email_encarregado',30);
            $table->string('morada_encarregado');
            $table->text('description');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscritos');
    }
};
