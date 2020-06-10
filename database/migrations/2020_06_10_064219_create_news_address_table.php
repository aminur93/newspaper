<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->unsigned();
            $table->integer('types_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->integer('zilla_id')->unsigned();
            $table->integer('upzilla_id')->unsigned();
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
        Schema::dropIfExists('news_address');
    }
}
