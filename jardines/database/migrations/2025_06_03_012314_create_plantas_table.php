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
    Schema::create('plantas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('nombre_cientifico')->nullable(); 
        $table->string('clima'); 
        $table->string('tipo_suelo'); 
        $table->string('frecuencia_agua'); 
        $table->string('exposicion_luz'); 
        $table->string('proposito'); 
        $table->text('descripcion')->nullable(); 
        $table->string('imagen')->nullable(); 
        $table->unsignedBigInteger('municipio_id'); 
        $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantas');
    }
};
