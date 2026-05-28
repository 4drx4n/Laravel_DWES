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
        Schema::create('historial_academico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumno_id')
                ->unique()
                ->constrained('alumno')
                ->onDelete('cascade');
            
            $table->decimal('nota_media', 4, 2)->nullable();
            $table->integer('asignaturas_aprobadas')->nullable();
            $table->integer('asignaturas_suspensas')->nullable();
            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_academico');
    }
};
