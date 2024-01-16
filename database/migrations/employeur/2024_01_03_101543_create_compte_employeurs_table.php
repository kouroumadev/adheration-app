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
        Schema::create('compte_employeurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entreprise_id');
            $table->string('libele');
            $table->string('debit');
            $table->string('credit');
            $table->string('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compte_employeurs');
    }
};
