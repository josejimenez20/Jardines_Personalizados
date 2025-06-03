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
            if (!Schema::hasColumn('municipios', 'clima')) {
                $table->string('clima')->nullable();
            }
            if (!Schema::hasColumn('municipios', 'suelo')) {
                $table->string('suelo')->nullable();
            }
            if (!Schema::hasColumn('municipios', 'agua')) {
                $table->string('agua')->nullable();
            }
            if (!Schema::hasColumn('municipios', 'luz')) {
                $table->string('luz')->nullable();
            }
            if (!Schema::hasColumn('municipios', 'proposito')) {
                $table->string('proposito')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipios', function (Blueprint $table) {
            if (Schema::hasColumn('municipios', 'clima')) {
                $table->dropColumn('clima');
            }
            if (Schema::hasColumn('municipios', 'suelo')) {
                $table->dropColumn('suelo');
            }
            if (Schema::hasColumn('municipios', 'agua')) {
                $table->dropColumn('agua');
            }
            if (Schema::hasColumn('municipios', 'luz')) {
                $table->dropColumn('luz');
            }
            if (Schema::hasColumn('municipios', 'proposito')) {
                $table->dropColumn('proposito');
            }
        });
    }
};
