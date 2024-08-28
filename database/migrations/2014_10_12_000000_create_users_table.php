<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->string('image')->nullable(); // Profile Photo
    //         $table->string('phone')->nullable(); // Phone Number
    //         $table->string('department')->nullable(); // Department
    //         $table->string('role_name')->default('Employee'); // Role Name
    //         $table->string('status')->default('Active'); // Status
    //         $table->float('salary')->nullable(); // Salary
    //         $table->timestamp('entry_date')->useCurrent(); // Entry Date (Date of Registration)
    //         $table->string('matricule')->nullable(); // Matricule (User ID based)
    //         $table->timestamp('email_verified_at')->nullable();
    //         $table->string('password');
    //         $table->rememberToken();
    //         $table->timestamps();
    //         $table->string('rec_id')->nullable();
    //     });
    //     $adminEmail = 'admin@gmail.com';
    //     if (DB::table('users')->where('email', $adminEmail)->doesntExist()) {
    //         DB::table('users')->insert([
    //             'name'        => 'Admin',
    //             'rec_id'      => 'ADMIN', // Generate as needed
    //             'email'       => $adminEmail,
    //             'password'    => Hash::make('123456789'),
    //             'status'      => 'Active',
    //             'phone'       => '1234567890', // Set as needed
    //             'image'       => 'photo_defaults.jpg', // Default profile photo
    //             'department'  => 'Admin',
    //             'role_name'   => 'Admin',
    //             'salary'      => 0, // Set as needed
    //             'entry_date'  => now(),
    //             'matricule'   => 'ADM-0001', // Generate as needed
    //             'email_verified_at' => now(),
    //             'remember_token'    => Str::random(10),
    //         ]);
    //     }
    // }
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->nullable(); // Profile Photo
            $table->string('phone')->nullable(); // Phone Number
            $table->string('department')->nullable(); // Department
            $table->string('role_name')->default('Employee'); // Role Name
            $table->string('status')->default('Active'); // Status
            $table->float('salary')->nullable(); // Salary
            $table->timestamp('entry_date')->useCurrent(); // Entry Date (Date of Registration)
            $table->string('matricule')->nullable(); // Matricule (User ID based)
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('rec_id')->nullable();
            
            // Adding the new columns
            $table->string('position')->default(''); // Position, default to an empty string
            $table->boolean('checked')->default(false); // Boolean field, default to false
        });
    
        $adminEmail = 'admin@gmail.com';
        if (DB::table('users')->where('email', $adminEmail)->doesntExist()) {
            DB::table('users')->insert([
                'name'        => 'Admin',
                'rec_id'      => 'ADMIN', // Generate as needed
                'email'       => $adminEmail,
                'password'    => Hash::make('123456789'),
                'status'      => 'Active',
                'phone'       => '1234567890', // Set as needed
                'image'       => 'photo_defaults.jpg', // Default profile photo
                'department'  => 'Admin',
                'role_name'   => 'Admin',
                'salary'      => 0, // Set as needed
                'entry_date'  => now(),
                'matricule'   => 'ADM-0001', // Generate as needed
                'email_verified_at' => now(),
                'remember_token'    => Str::random(10),
                'position'   => 'Administrator', // Default position for admin
                'checked'  => true, // Admin is active by default
            ]);
        }
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

