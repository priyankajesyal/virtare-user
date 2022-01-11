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
            $table->foreign('providerId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('stateId')->unsigned();
            $table->foreign('stateId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('cityId')->unsigned();
            $table->foreign('cityId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('zipCode',10);
            $table->text('locationAddress');
            $table->string('phoneNumber',20);
            $table->string('email',50);
            $table->text('websiteUrl');
            $table->boolean('isActive')->default(1);
            $table->boolean('isDelete')->default(0);
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('updatedBy')->unsigned()->nullable();
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt');
            $table->timestamp('deletedAt')->nullable();

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
