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
        // Schema::create('filieres', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('filiere')->unique();
        //     $table->string('profil')->default('commun');
        //     $table->timestamps();
        // });

        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('filiere');
            $table->string('profil');
            $table->timestamps();

            $table->unique(['filiere', 'profil']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filieres');
    }
};
