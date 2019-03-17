<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station__lists', function (Blueprint $table) {
            $table->increments('stationListId');
            $table->unsignedInteger('station');
            $table->unsignedInteger('sampleTest');
            $table->dateTime('timeReceived');
            $table->dateTime('timeCompleted')->nullable();
            $table->string('managedBy');
            $table->timestamps();

            $table->foreign('station')->references('stationId')->on('stations')->onDelete('cascade');
            $table->foreign('sampleTest')->references('testId')->on('sample__tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('station__lists');
    }
}
