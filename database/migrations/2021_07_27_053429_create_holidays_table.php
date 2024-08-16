<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holidays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Adding user_id as unsignedBigInteger
            $table->string('from_date'); // From date as date
            $table->string('to_date'); // To date as date
            $table->string('number_of_days'); // Number of days as string
            $table->string('reason')->nullable(); // Reason as text
            $table->boolean('status_MD')->nullable()->default(null);
            $table->boolean('status_HD')->nullable()->default(null);// Status HD as boolean
            $table->boolean('status_FD')->nullable()->default(null); // Status FD as boolean
            $table->boolean('status_Ch5')->nullable()->default(null); // Status Ch5 as boolean
            $table->boolean('confirmed')->default(false); // Confirmed as boolean
            $table->timestamps();

            // Adding foreign key constraint if needed
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
}
