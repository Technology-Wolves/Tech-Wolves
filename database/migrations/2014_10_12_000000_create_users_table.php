<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telephone');
            $table->string('address');
            $table->string('gender');
            $table->string('password');
            $table->string('regType');
            $table->string('profileImage')->nullable();
            $table->boolean('isAdmin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@admin.com',
            'telephone' => '9843324021',
            'address' => 'Satdobato',
            'gender' => 'male',
            'password' => Hash::make('admin'),
            'regType' => 'ADMIN',
            'profileImage' => 'default.png',
            'isAdmin' => true,
            'remember_token' => Str::random(10),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
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
