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
        Schema::create('energias_renovables', function (Blueprint $table) {
            $table->id('Id_sugerencias');
            $table->text('Descripción');
            $table->foreignId('Id_costos')->nullable()->constrained('costos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energias_renovables');
    }
};
