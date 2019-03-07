<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RIS', function (Blueprint $table) {
            $table->increments('risNumber');
            $table->date('year')->nullable();
            $table->string('nameOfPerson')->nullable();
            $table->string('nameOfEntity')->nullable();
            $table->string('address')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('faxNumber')->nullable();
            $table->string('emailAddress')->nullable();
            $table->string('dateOfSubmission')->nullable();
            $table->string('manageBy')->nullable();
            $table->string('manageDate')->nullable();

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
        Schema::dropIfExists('RIS');
    }
}
