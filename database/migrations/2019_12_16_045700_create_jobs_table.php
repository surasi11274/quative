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


            $table->string('email');
            $table->integer('phone');
            $table->text('requirement');

            $table->datetime('finishdate')->nullable();
            $table->integer('pricerate')->nullable();
            $table->text('productPic');

            $table->datetime('refpicbyUser');

            $table->text('reference');

            $table->string('file');
            $table->integer('rating');
            $table->boolean('canshow')->default(0);
            $table->string('token',16)->nullable();

            $table->integer('reviews_id')->nullable();
            $table->integer('jobstatus_id')->nullable();

            


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
