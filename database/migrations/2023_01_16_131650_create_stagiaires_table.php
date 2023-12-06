<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->date('date_demande');
            $table->string('site')->nullable();
            $table->string('civilite');
            $table->string('prenom');
            $table->string('nom');
            $table->string('cin');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('photo',300)->nullable();
            $table->string('niveau');
            $table->string('diplome')->nullable();
            $table->string('filiere');
            $table->string('etablissement');
            $table->string('ville');
            $table->string('type_stage');
            $table->string('service');
            $table->integer('encadrant')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('sujet')->nullable();
            $table->boolean('remunere')->nullable();
            $table->boolean('EI')->nullable();
            $table->boolean('annule')->nullable();
            $table->boolean('prolongation')->nullable();
            $table->date('date_fin_finale')->nullable();
            $table->date('Attestation_remise')->nullable();
            $table->string('Att_remise_a')->nullable();
            $table->string('observation')->nullable();
            $table->string('created_by')->nullable();
            $table->string('edited_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagiaires');
    }
};
