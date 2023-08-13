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
        Schema::create('fillia_ensinos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fillia');
            $table->foreignId('id_ensino');
            $table->string('name_ensino',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fillia_ensinos');
    }
};
