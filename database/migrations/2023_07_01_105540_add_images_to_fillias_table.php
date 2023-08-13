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
        Schema::table('fillias', function (Blueprint $table) {
            $table->string('slider_01');
            $table->string('slider_02');
            $table->string('slider_03');
            $table->string('slider_04');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fillias', function (Blueprint $table) {
            $table->dropColumn('slider_01');
            $table->dropColumn('slider_02');
            $table->dropColumn('slider_03');
            $table->dropColumn('slider_04');
        });
    }
};
