<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('designer_id')->nullable();

            $table->integer('jobs_id')->nullable();
            
            $table->integer('rating');

            $table->text('reviewdescription');
            $table->string('complacency');
            $table->string('reasonableprice');
            $table->string('skillandexpertise');


            // $table->string('file');
            

            


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
