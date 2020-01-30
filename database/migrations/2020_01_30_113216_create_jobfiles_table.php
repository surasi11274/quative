<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('jobfiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('designer_id');
            $table->integer('job_id');

            $table->string('fileimgname')->nullable();
            $table->string('fileartworkname')->nullable();
            $table->string('filelinks')->nullable();

            $table->text('workdescription')->nullable();



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
        //
    }
}
