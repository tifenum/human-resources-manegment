<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDayAndAmountOfTimeToDelaysTable extends Migration
{
    public function up()
    {
        Schema::table('delays', function (Blueprint $table) {
            // Add 'day' column allowing NULL values initially
            $table->date('day')->nullable()->after('return_time');
            // Add 'amount_of_time' column allowing NULL values initially
            $table->string('amount_of_time')->nullable()->after('day');
        });
    }

    public function down()
    {
        Schema::table('delays', function (Blueprint $table) {
            $table->dropColumn('day');
            $table->dropColumn('amount_of_time');
        });
    }
}


