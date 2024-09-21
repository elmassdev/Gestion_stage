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
        Schema::create('signatures', function (Blueprint $table) {
            $table->id();
            $table->string('logo',300)->nullable();
            $table->string('head1');
            $table->string('head2');
            $table->string('head3');
            $table->string('head4');
            $table->string('sign1');
            $table->string('sign2');
            $table->string('sign_op');
            $table->string('sigle');
            $table->string('phone');
            $table->string('Fax');
            $table->boolean('is_active')->default(true);
            $table->timestamp('effective_date')->useCurrent();
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
        Schema::dropIfExists('signatures');
    }
};
