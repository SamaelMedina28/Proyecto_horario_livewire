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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salon_id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('materia_id')->constrained()->cascadeOnDelete();
            $table->foreign('salon_id')->references('id')->on('salones')->cascadeOnDelete();
            $table->enum('dia', ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes']);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();

            $table->index(['user_id', 'dia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
