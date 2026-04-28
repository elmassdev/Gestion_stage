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
            $table->string('civilite', 5);
            $table->string('prenom', 100);
            $table->string('nom', 100);
            $table->string('cin', 20);
            $table->string('phone', 20)->nullable();
            $table->string('email',100)->nullable();
            $table->string('photo',300)->nullable();
            $table->string('niveau',100)->nullable();
            $table->string('diplome',100)->nullable();
            $table->string('filiere')->nullable();;
            $table->string('etablissement')->nullable();;
            $table->string('ville',50)->nullable();;
            $table->string('type_stage',50)->nullable();
            $table->integer('service')->nullable();;
            $table->integer('encadrant')->nullable();
            $table->date('date_debut')->nullable();;
            $table->date('date_fin')->nullable();;
            $table->text('sujet')->nullable();
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
            $table->date('OP_etabli_le')->nullable();
            $table->string('Op_etabli_par')->nullable();
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
