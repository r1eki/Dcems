<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('news_title');
            $table->string('news_slug');
            $table->text('news_content');
            $table->string('news_image');
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('news');
    }
}
