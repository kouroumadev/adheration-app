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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
             $table->string('nom_employer')->nullable();
             $table->string('prenom_employer')->nullable();
             $table->string('sexe_employer')->nullable();
             $table->string('matricule')->nullable();
             $table->foreignId('entreprise_id')->constrained();
            //  $table->string('entreprise_id')->nullable();
             $table->string('adresse_employer')->nullable();
             $table->string('email_employer')->nullable();
             $table->string('n_immatriculation')->nullable();
             $table->string('date_naissance_employer')->nullable();
             $table->string('lieu_naissance_employer')->nullable();
             $table->string('nationalite')->nullable();
             $table->string('prenom_pere')->nullable();
             $table->string('prenom_mere')->nullable();
             $table->string('nom_pere')->nullable();
             $table->string('nom_mere')->nullable();
             $table->string('situation_matrimoniale')->nullable();
             $table->string('profession')->nullable();
             $table->string('n_cin')->nullable();
             $table->string('date_del_cin')->nullable();
             $table->string('lieu_del_cin')->nullable();
             $table->string('n_acte_naissance')->nullable();
             $table->string('date_del_acte_naissance')->nullable();
             $table->string('lieu_del_acte_naissance')->nullable();
             $table->string('etat_employer')->nullable();
             $table->string('date_embauche')->nullable();
             $table->string('date_immatriculation')->nullable();
             $table->string('liberer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
