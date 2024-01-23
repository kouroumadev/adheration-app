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
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained();
            $table->string('parent_id');
            $table->foreignId('employer_id')->constrained();
            $table->string('jour_declare');
            $table->string('mois');
            $table->string('annee');
            $table->string('salaire_brute');
            $table->string('salaire_soumis');
            $table->string('montant_cotise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotisations');
    }
};
