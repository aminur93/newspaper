<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('sub_cat_id')->unsigned();
            $table->integer('tag_id');
            $table->string('headline');
            $table->string('title');
            $table->text('description');
            $table->string('author');
            $table->date('date');
            $table->integer('news_count');
            $table->string('image');
            $table->tinyInteger('status');
            $table->tinyInteger('publish');
            $table->tinyInteger('feature');
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
        Schema::dropIfExists('news_posts');
    }
}
