<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpZillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('up_zillas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('types_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('zilla_id')->unsigned();
            $table->string('upzilla_name');
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
        Schema::dropIfExists('up_zillas');
    }
}
