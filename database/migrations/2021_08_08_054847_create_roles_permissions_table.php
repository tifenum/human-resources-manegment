<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permissions_name')->nullable();
            $table->timestamps();
        });

        DB::table('roles_permissions')->insert(
        [
            ['permissions_name' => 'Admin'],
            ['permissions_name' => 'Head of department'],
            ['permissions_name' => 'Financial director'],
            ['permissions_name' => 'Cheif of staff'],
            ['permissions_name' => 'Employee'],
            ['permissions_name' => 'Manager director'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
