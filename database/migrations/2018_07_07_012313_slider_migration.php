<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SliderMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_img');
            $table->string('slider_name')->nullable();
            $table->string('slider_slug')->nullable();
            $table->enum('is_active', ['Y', 'N']);
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
        Schema::dropIfExists('sliders');
    }
}
