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
            $table->text('about');
            $table->text('experience');
            $table->string('tagStyle');
            $table->string('website');
            $table->string('personalID');
            $table->string('titleName');
            $table->string('name');
            $table->string('surname');
            $table->text('address');
            $table->integer('zipcode');
            $table->string('selfie_ID');
            $table->string('picture_IDCard');
            $table->string('bankname');
            $table->integer('bankaccount');
            $table->string('picture_bookbank');
            $table->boolean('hasjob');
            $table->integer('rate');
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
