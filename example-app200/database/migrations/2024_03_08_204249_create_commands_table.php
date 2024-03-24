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
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->integer('etat');
            $table->integer('Qte');
            $table->string('type_paiement');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('paiement_id')->constrained()->nullable();
             $table->foreignId('livrision_id')->constrained()->nullable();
            $table->foreignId('produit_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commands');
    }
};
