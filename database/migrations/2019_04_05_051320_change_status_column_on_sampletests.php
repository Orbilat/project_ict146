<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStatusColumnOnSampletests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sample__tests', function (Blueprint $table) {
            $table->string('status', 15)->default('Not Started')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sample__tests', function (Blueprint $table) {
            $table->string('status')->default('In Progress')->change();
        });
    }
}
