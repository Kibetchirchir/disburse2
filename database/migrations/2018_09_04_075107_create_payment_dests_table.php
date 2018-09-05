<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_dests', function (Blueprint $table) {
            $table->increments('paymentDestId');
            $table->unsignedInteger('modeId')->index();
            $table->unsignedInteger('beneficiaryId')->index();
            $table->string('account');
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('amount');
            $table->unsignedInteger('tempId')->index();
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
        Schema::dropIfExists('payment_dests');
    }
}
