<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->increments('batch_id');
            $table->string('batch_no');
            $table->integer('full_amount');
            $table->unsignedInteger('uploaded_by')->index();
            $table->unsignedInteger('aproved_by')->index();
            $table->unsignedInteger('client_id')->index();
            $table->integer('approved')->default(0);
            $table->timestamps();
        });

        Schema::table('batches', function (Blueprint $table) {
            $table->foreign('uploaded_by')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('clientId')->on('clients')->onDelete('cascade');
            $table->foreign('aproved_by')->references('userId')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('batches');
    }
}
