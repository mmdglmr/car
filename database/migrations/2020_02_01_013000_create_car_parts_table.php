<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_parts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('car_part_type_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();

            $table->foreign('car_part_type_id')->references('id')->on('car_part_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_parts');
    }
}
