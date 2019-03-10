<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('itemId');
            $table->integer('itemNumber');
            $table->string('itemType');
            $table->string('containerType');
            $table->integer('quantity')->default(1);
            $table->float('volumeCapacity')->default(0);
            $table->date('acquiredDate');
            $table->date('expiryDate');
            $table->unsignedInteger('supplier');
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
        Schema::dropIfExists('items');
    }
}
