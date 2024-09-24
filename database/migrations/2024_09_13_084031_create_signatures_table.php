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
            $table->string('head2')->nullable();
            $table->string('head3')->nullable();
            $table->string('head4')->nullable();
            $table->string('sign1')->nullable();
            $table->string('sign2')->nullable();
            $table->string('sign_op')->nullable();
            $table->string('sigle')->nullable();
            $table->string('phone')->nullable();
            $table->string('Fax')->nullable();
            $table->string('site')->nullable();
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
