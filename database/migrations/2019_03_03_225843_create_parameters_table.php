<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('parameterId');
            $table->string('analysis');
            $table->string('method');
            $table->unsignedInteger('stationId');
            $table->string('managedBy');
            $table->dateTime('managedDate');
            $table->timestamps();
      
            $table->foreign('stationId')->references('stationId')->on('stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
