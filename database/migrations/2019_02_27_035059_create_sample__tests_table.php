<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampleTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample__tests', function (Blueprint $table) {
            $table->increments('testId');
            $table->unsignedInteger('sampleCode');
            $table->date('sampleDate');
            $table->unsignedInteger('parameters');
            $table->string('status');
            $table->string('managedBy');
            $table->dateTime('managedDate');
            $table->dateTime('timecompleted')->nullable();
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
        Schema::dropIfExists('sample__tests');
    }
}
