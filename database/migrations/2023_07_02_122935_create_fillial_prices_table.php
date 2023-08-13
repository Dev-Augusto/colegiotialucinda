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
        Schema::create('fillial_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fillia');
            $table->integer('classe');
            $table->string('curso',100);
            $table->decimal('inscricao',10,2);
            $table->decimal('confirmacao',10,2);
            $table->decimal('uniforme',10,2);
            $table->decimal('propina',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fillial_prices');
    }
};
