<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample', function (Blueprint $table) {
            $table->increments('sampleID');
            $table->date('date')->nullable();
            $table->unsignedInteger('risNumber')->nullable();
            $table->string('clientsCode')->nullable();
            $table->string('sampleMatrix')->nullable();
            $table->string('collectionTime')->nullable();
            $table->string('samplePreservation')->nullable();
            $table->string('purposeOfAnalysis')->nullable();
            $table->string('sampleSource')->nullable();
            $table->string('dueDate')->nullable();
            $table->string('managedBy')->nullable();
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
        Schema::dropIfExists('samples');
    }
}
