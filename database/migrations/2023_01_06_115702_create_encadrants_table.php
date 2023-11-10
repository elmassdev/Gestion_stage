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
        Schema::create('encadrants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre')->references('titre')->on('civilite');
            $table->string('prenom');
            $table->string('nom');
            $table->string('phone');
            $table->string('email');
            $table->string('service')->references('sigle_service')->on('services');
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
        Schema::dropIfExists('encadrants');
    }
};
