<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('stationId');
            $table->unsignedInteger('samples');
            $table->unsignedInteger('handledBy');
            $table->string('stationname');
            $table->dateTime('timeReceived');
            $table->dateTime('timeCompleted')->nullable();
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
        Schema::dropIfExists('stations');
    }
}