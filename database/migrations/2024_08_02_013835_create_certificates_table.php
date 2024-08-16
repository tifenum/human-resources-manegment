<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->string('issued_for');
            $table->float('salary');
            $table->string('department');
            $table->string('certificate_name')->default("no certificate");
            $table->text('description')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->boolean('status_MD')->nullable()->default(null);
            $table->boolean('status_HD')->nullable()->default(null);
            $table->boolean('status_FD')->nullable()->default(null);
            $table->boolean('status_Ch5')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
