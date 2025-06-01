<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('departamento');
            $table->string('clima');
            $table->string('tipo_suelo');
            $table->string('exposicion_luz');
            $table->string('frecuencia_agua');
            $table->string('proposito');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};

