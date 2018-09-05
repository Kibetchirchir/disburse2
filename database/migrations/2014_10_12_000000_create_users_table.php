<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('userId');
            $table->string('userNationalId')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('userActive')->default(0);
            $table->unsignedInteger('roleId')->index();
            $table->unsignedInteger('clientId')->index();
            $table->integer('verified')->default(0);
            $table->string('email_token')->unique();
        });
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
