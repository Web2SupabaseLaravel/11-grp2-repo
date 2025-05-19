<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id('id_user'); // Custom primary key as int4
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_users');
    }
};