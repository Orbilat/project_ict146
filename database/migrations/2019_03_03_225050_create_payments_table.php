<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('paymentId');
            $table->unsignedInteger('testingCost')->default(0)->nullable();
            $table->float('discount')->default(0)->nullable();
            $table->float('addedCharges')->default(0)->nullable();
            $table->float('depositedAmount')->nullable();
            $table->float('totalAmount')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
