<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transId');
            $table->string('transRefNo');
            $table->string('narration')->nullable();
            $table->unsignedInteger('modeId')->index();
            $table->unsignedInteger('clientId')->index();
            $table->unsignedInteger('userId')->index();
            $table->integer('status')->default(0);
            $table->string('name');
            $table->string('account');
            $table->string('bankName')->nullable();
            $table->string('branchName')->nullable();
            $table->string('batch_no');
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
        Schema::dropIfExists('transactions');
    }
}
