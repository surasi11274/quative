<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('jobs',function($table) {
            $table->integer('package_price')->after('requirement')->nullable();
            $table->integer('dateextra_price')->after('package_price')->nullable();
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
        Schema::table('jobs',function($table) {
            $table->dropColum('package_price');
            $table->dropColum('dateextra_price');
        });
    }
}
