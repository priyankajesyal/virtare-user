<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class CreateGlobalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalCodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('globalCodeCategoryId')->unsigned();
            $table->foreign('globalCodeCategoryId')->references('id')->on('globalCodeCategories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description');
            $table->boolean('isActive')->default(1);
            $table->boolean('isDelete')->default(0);
            $table->bigInteger('createdBy')->unsigned()->nullable();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('updatedBy')->unsigned()->nullable();
            $table->foreign('updatedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('deletedBy')->unsigned()->nullable();
            $table->foreign('deletedBy')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('createdAt')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('_global__codes');
    }
}
