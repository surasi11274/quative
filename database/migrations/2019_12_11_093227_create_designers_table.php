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
            $table->string('tag');


            $table->string('personalID');
            $table->string('titleName');
            $table->string('name');
            $table->string('surname');
            $table->datetime('birthdate');
            $table->text('address');
            $table->integer('zipcode');
            $table->string('selfie_ID');
            $table->string('picture_IDCard');

            $table->integer('pricerate');
            $table->string('bankname');
            $table->integer('bankaccount');

            $table->boolean('hasjob');
            $table->integer('rating');
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
