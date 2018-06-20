<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('ingridient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('dimension', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('ingredients_for_prescription', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prescription_id')->unsigned();
            $table->integer('ingridient_id')->unsigned();
            $table->integer('dimension_id')->unsigned();
            $table->foreign('prescription_id')->references('id')->on('prescription');
            $table->foreign('ingridient_id')->references('id')->on('ingridient');
            $table->foreign('dimension_id')->references('id')->on('dimension');
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
        Schema::dropIfExists('ingredients_for_prescription');
        Schema::dropIfExists('prescription');
        Schema::dropIfExists('ingridient');
        Schema::dropIfExists('dimension');

    }
}
