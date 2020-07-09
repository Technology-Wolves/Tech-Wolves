<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
        });

        DB::table('contacts')->insert([
            'name' => 'Test Name',
            'email' => 'test@test.com',
            'subject' => 'Subject Here',
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut earum necessitatibus, neque possimus quisquam quo sapiente! Assumenda ea nulla quo sapiente? Blanditiis cum, cupiditate itaque laboriosam quaerat quibusdam ratione.'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
