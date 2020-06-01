<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zillas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('types_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->string('zilla_name');
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
        Schema::dropIfExists('zillas');
    }
}
