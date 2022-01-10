<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providerLocations', function (Blueprint $table) {
            $table->id();
            $table->string('locationName',50);
            $table->bigInteger('providerId')->unsigned();
            $table->bigInteger('stateId')->unsigned();
            $table->bigInteger('cityId')->unsigned();
            $table->string('zipCode',10);
            $table->text('locationAddress');
            $table->string('phoneNumber',20);
            $table->string('email',50);
            $table->text('websiteUrl');
            $table->boolean('isActive');
            $table->boolean('isDelete');
            $table->bigInteger('createdBy')->unsigned();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('updatedBy')->unsigned();
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('deletedBy')->unsigned();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');
            $table->timestamp('deletedAt');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provider_locations');
    }
}
