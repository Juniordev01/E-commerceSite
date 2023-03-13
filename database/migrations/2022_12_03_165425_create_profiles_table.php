<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("Full_name");
            $table->string('Description')->nullable();
            $table->string('Educaiton1');
            $table->string('city');
            $table->string('Language');
            $table->string('Skype');
            $table->string('Address');
            $table->string('Gender');
            $table->string('Email');
            $table->string('Github');
            $table->string('Twitter');
            $table->enum('status',["Active",'Deactive']);
            $table->date('Birthday');
            $table->integer('Phone_no');
            $table->string('Image');
            $table->unsignedbiginteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
};
