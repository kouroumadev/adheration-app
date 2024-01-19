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
        Schema::create('assure_parents', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pere')->nullable();
            $table->string('prenom_pere')->nullable();
            $table->string('date_naissance_pere')->nullable();
            $table->string('lieu_naissance_pere')->nullable();
            $table->string('etat_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('prenom_mere')->nullable();
            $table->string('date_naissance_mere')->nullable();
            $table->string('lieu_naissance_mere')->nullable();
            $table->string('etat_mere')->nullable();
            $table->foreignId('employer_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assure_parents');
    }
};
