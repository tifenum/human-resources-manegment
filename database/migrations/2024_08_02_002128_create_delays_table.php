<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelaysTable extends Migration
{
    public function up()
    {
        Schema::create('delays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('reason');
            $table->time('exit_time');
            $table->time('return_time');
            $table->boolean('status_MD')->default(false);
            $table->boolean('status_HD')->default(false);
            $table->boolean('status_FD')->default(false);
            $table->boolean('status_Ch5')->default(false);
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delays');
    }
}
