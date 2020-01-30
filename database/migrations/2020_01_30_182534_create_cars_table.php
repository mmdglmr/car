<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('car_features_id');
            $table->string('brand');
            $table->string('model');
            $table->string('series')->nullable();
            $table->tinyInteger('body_class');
            $table->tinyInteger('builder_company');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('car_features_id')->references('id')->on('car_features');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
