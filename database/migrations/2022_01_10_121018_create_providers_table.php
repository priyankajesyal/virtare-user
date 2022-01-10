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
            $table->bigInteger('stateId')->unsigned();
            $table->bigInteger('cityId')->unsigned();
            $table->string('zipCode',10);
            $table->bigInteger('tagId')->unsigned();
            $table->bigInteger('moduleId')->unsigned();
            $table->bigInteger('defaultLocationId')->unsigned();
            $table->integer('totalLocations',10);
            $table->boolean('isActive')->default(1);
            $table->boolean('isDelete')->nullable();
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->timestamp('createdAt');
            $table->bigInteger('updatedBy')->unsigned()->nullable();
            $table->timestamp('updatedAt');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->timestamp('deletedAt')->nullable();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('countryId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stateId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tagId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('moduleId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('defaultLocationId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cityId')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');
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
