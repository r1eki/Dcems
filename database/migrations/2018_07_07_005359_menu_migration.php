<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name');
            $table->string('menu_url');
            $table->string('menu_icon');
            $table->integer('menu_parent');
            $table->integer('menu_level');
            $table->integer('menu_type_parent');
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
        Schema::dropIfExists('menus');
    }
}
