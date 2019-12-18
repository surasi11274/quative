<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('designer_id')->nullable();

            $table->integer('categories_id');
            $table->text('categories');

            $table->text('tags');
            $table->datetime('finishdate');


            $table->string('email');
            $table->integer('phone');
            $table->text('requirement');

            $table->integer('pricerate');

            $table->text('reference')->nullable();;

            $table->string('file');
            $table->boolean('status')->default(0);

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
        Schema::dropIfExists('jobs');
    }
}
