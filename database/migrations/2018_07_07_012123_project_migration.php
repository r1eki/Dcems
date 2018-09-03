<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id');
            $table->string('project_name');
            $table->string('project_slug');
            $table->string('project_img');
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
        Schema::dropIfExists('projects');
    }
}
