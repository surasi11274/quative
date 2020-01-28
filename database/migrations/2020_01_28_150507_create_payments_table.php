<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('designer_id');
            $table->integer('job_id');

            $table->string('name');
            $table->string('surname');

            $table->integer('price');
            $table->string('bank');
            $table->date('dateatTransfer');
            $table->timestamp('timeatTransfer');
            $table->text('fileTransfer');
            $table->text('description')->nullable();

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
