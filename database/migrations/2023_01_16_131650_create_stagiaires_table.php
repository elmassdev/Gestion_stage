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
            $table->string('type_stage')->nullable();
            $table->integer('service');
            $table->integer('encadrant')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('sujet')->nullable();
            $table->boolean('remunere')->nullable();
            $table->boolean('EI')->nullable();
            $table->string('type_formation')->nullable();
            $table->boolean('annule')->nullable();
            $table->string('observation')->nullable();
            $table->date('dateLO')->nullable();
            $table->integer('absence')->default(0);
            $table->boolean('prolongation')->nullable();
            $table->date('date_fin_finale')->nullable();
            $table->date('date_reception_FFS')->nullable();
            $table->date('date_Att_etablie')->nullable();
            $table->date('Attestation_remise_le')->nullable();
            $table->string('Att_remise_a')->nullable();
            $table->boolean('OP_etabli')->nullable();
            $table->date('indemnite_remise_le')->nullable();
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
