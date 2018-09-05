<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('clientId');
            $table->string('firstName')->nullable();
            $table->string('secondName')->nullable();
            $table->string('nationality')->nullable();
            $table->string('password');
            $table->unsignedInteger('clientStatus')->default(0);
            $table->unsignedInteger('clientTypeId')->index();
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
        Schema::dropIfExists('clients');
    }
}
