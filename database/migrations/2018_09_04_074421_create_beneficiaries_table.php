<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->increments('beneficiaryId');
            $table->string('firstName');
            $table->string('secondName')->nullable();
            $table->string('identity')->nullable();
            $table->string('contact')->nullable();
            $table->unsignedInteger('userId')->index();
            $table->unsignedInteger('clientId')->index();
            $table->unsignedInteger('beneficiaryTypeId')->nullable()->index();
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
        Schema::dropIfExists('beneficiaries');
    }
}
