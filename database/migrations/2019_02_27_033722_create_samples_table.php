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
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('sampleId');
            $table->date('date');
            $table->unsignedInteger('risNumber');
            $table->string('clientsCode')->nullable();
            $table->string('sampleMatrix');
            $table->time('collectionTime');
            $table->string('samplePreservation');
            $table->string('purposeOfAnalysis');
            $table->string('sampleSource');
            $table->date('dueDate');
            $table->string('managedBy');
            $table->dateTime('managedDate');
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
