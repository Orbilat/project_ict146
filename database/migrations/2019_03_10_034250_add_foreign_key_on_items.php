<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyOnItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('itemNumber')->unsigned()->change();

            //$table->foreign('itemNumber')->references('itemId')->on('items')->onDelete('cascade');
            $table->foreign('supplier')->references('supplierId')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('itemNumber')->change();

            $table->dropForeign('itemNumber');
            $table->dropForeign('supplier');
        });
    }
}
