<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->unsignedBigInteger('course_id');
            $table->text('title')->nullable();
            $table->integer('minutes');
            $table->text('ingredients')->nullable();
            $table->text('description')->nullable();
            $table->integer('author')->unique()->nullable();
            $table->timestamps();
            $table->foreign('cate_id')->references('id')->on('categories');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
