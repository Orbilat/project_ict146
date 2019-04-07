<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItems extends Migration
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
            $table->string('itemName');
            $table->string('containerType');
            $table->string('volumeCapacity')->nullable();
            $table->integer('quantity')->default(1);
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
