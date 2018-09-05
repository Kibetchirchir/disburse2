<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_types', function (Blueprint $table) {
            $table->increments('beneficiaryTypeId');
            $table->string('name');
            $table->unsignedInteger('clientId')->index();
            $table->timestamps();
        });


        /**
         * relationship
         *
         */

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('roleId')->references('roleId')->on('user_roles')->onDelete('cascade');
            $table->foreign('clientId')->references('clientId')->on('clients')->onDelete('cascade');
        });

        /**
         * client
         */
        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('clientTypeId')->references('clientTypeId')->on('client_types')->onDelete('cascade');
        });
        /**
         * contacts
         */
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('contactTypeId')->references('contactTypeId')->on('contact_types')->onDelete('cascade');
            $table->foreign('clientId')->references('clientId')->on('clients')->onDelete('cascade');
        });
        /**
         * documents
         */
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('documentIdType')->references('documentTypeId')->on('document_types')->onDelete('cascade');
            $table->foreign('clientId')->references('clientId')->on('clients')->onDelete('cascade');
        });
        /**
         * beneficiary
         */
        Schema::table('beneficiaries', function (Blueprint $table) {
            $table->foreign('beneficiaryTypeId')->references('beneficiaryTypeId')->on('beneficiary_types')->onDelete('cascade');
        });

        /**
         * payment dest
         */
        Schema::table('payment_dests', function (Blueprint $table) {
            $table->foreign('modeId')->references('modeId')->on('modes')->onDelete('cascade');
            $table->foreign('beneficiaryId')->references('beneficiaryId')->on('beneficiaries')->onDelete('cascade');
            $table->foreign('tempId')->references('templateId')->on('templates')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiary_types');
    }
}
