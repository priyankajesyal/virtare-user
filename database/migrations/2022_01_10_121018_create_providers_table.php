<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->text('address');
            $table->bigInteger('countryId')->unsigned();
            $table->foreign('countryId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('stateId')->unsigned();
            $table->foreign('stateId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('cityId')->unsigned();
            $table->foreign('cityId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('zipCode',10);
            $table->bigInteger('tagId')->unsigned();
            $table->foreign('tagId')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('moduleId')->unsigned();
            $table->foreign('moduleId')->references('id')->on('globalCodes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('defaultLocationId')->unsigned();
            $table->foreign('defaultLocationId')->references('id')->on('providerLocations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('totalLocations');
            $table->boolean('isActive')->default(1);
            $table->boolean('isDelete')->default(0);
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('createdAt');
            $table->bigInteger('updatedBy')->unsigned()->nullable();
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('updatedAt');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('providers');
    }
}
