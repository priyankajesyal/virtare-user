<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalCodeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalCodeCategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        Schema::dropIfExists('_global__code__categories');
    }
}
