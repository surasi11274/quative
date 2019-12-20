<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('phonenumber');
            $table->string('profilepic');
            $table->text('tag');


            $table->string('personalID');
            $table->string('titleName');
            $table->string('name');
            $table->string('surname');
            $table->date('birthdate');
            $table->text('address');
            $table->integer('zipcode');
            $table->string('selfieID');
            $table->string('pictureIDCard');

            // $table->integer('pricerate');
            $table->string('bankname');
            $table->integer('bankaccount');

            $table->integer('user_id')->nullable();
            $table->string('token',16)->nullable();

            $table->boolean('hasjob')->default(0);
            $table->integer('rating')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designers');
    }
}
