<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('poste')->nullable();
            $table->integer('numero')->nullable();
            $table->string('prenom')->nullable();
            $table->date('naissance_at')->nullable();
            $table->float('poids')->nullable();
            $table->float('taille')->nullable();
            $table->string('club')->nullable();
            $table->float('valeur')->nullable();
            $table->date('fin_contrat_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('idUser')->on('users')->onDelete('cascade')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
