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
        Schema::table('municipios', function (Blueprint $table) {
            $table->string('clima')->nullable();
            $table->string('suelo')->nullable();
            $table->string('agua')->nullable();
            $table->string('luz')->nullable();
            $table->string('proposito')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->dropColumn(['clima', 'suelo', 'agua', 'luz', 'proposito']);
        });
    }
};
