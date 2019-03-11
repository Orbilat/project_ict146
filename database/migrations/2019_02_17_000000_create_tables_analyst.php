<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// to run migration -- `php artisan migrate`
class CreateTablesAnalyst extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //All primary key must be bigInt(bigIncrements) to have a higher number capacity
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('risNumber');
            $table->string('year');
            $table->string('nameOfPerson',100);
            $table->string('nameOfEntity',100);
            $table->string('address',250);
            $table->integer('contactNumber');
            $table->integer('faxNumber')->nullable();
            $table->string('emailAddress',100)->nullable();
            $table->date('dateOfSubmission')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('sample', function (Blueprint $table) {
            $table->bigIncrements('sampleId');
            $table->date('duedate');
            $table->date('collectionTime',100);
            $table->string('purposeOfAnalysis',100);
            $table->unsignedBigInteger('risNumber');

            $table->foreign('risNumber')->references('risNumber')->on('client');
            $table->timestamps();
        });

        Schema::create('stations', function (Blueprint $table) {
            $table->bigIncrements('stationId');
            $table->string('stationname');

            $table->timestamps();
        });

        Schema::create('parameters', function (Blueprint $table) {
            $table->bigIncrements('parameterId');
            $table->string('analysis');
            $table->string('method');
            $table->string('chargePerSample');
            $table->string('samplePrepCharge');
            $table->string('managedBy',250);
            $table->date('managedDate')->nullable();
            $table->unsignedBigInteger('stationId');

            $table->foreign('stationId')->references('stationId')->on('stations');
            $table->timestamps();
        });

        Schema::create('sample_tests', function (Blueprint $table) {
            $table->bigIncrements('testId');
            $table->unsignedBigInteger('sampleId');
            $table->unsignedBigInteger('parameterId');
            $table->string('status',100);
            $table->dateTime('timecompleted')->nullable();
            $table->string('managedBy',250);
            $table->date('managedDate')->nullable();
            $table->date('sampleDate')->nullable();

            $table->foreign('sampleId')->references('sampleId')->on('sample');
            $table->foreign('parameterId')->references('parameterId')->on('parameters');
        });

        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('itemId');
            $table->string('itemType',100);
            $table->string('containerType',100);
            $table->unsignedBigInteger('quantity');
            $table->date('expiryDate')->nullable();
        });

        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('empId');
            $table->string('username',100);
            $table->string('password',100);
            $table->string('position',100);
            $table->string('name',100);
        });

        Schema::create('inventory', function (Blueprint $table) {
            $table->bigIncrements('inventoryId');
            $table->unsignedBigInteger('empId');
            $table->date('dateofuse');

            $table->foreign('empId')->references('empId')->on('employee');
        });

        Schema::create('inventory_list', function (Blueprint $table) {
            $table->bigIncrements('listId');
            $table->unsignedBigInteger('inventoryId');
            $table->unsignedBigInteger('itemId');
            $table->unsignedBigInteger('qty');
            $table->timestamps();


            $table->foreign('inventoryId')->references('inventoryId')->on('inventory');
            $table->foreign('itemId')->references('itemId')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
        Schema::dropIfExists('sample');
        Schema::dropIfExists('parameters');
        Schema::dropIfExists('sample_test');
        Schema::dropIfExists('item');
    }
}
