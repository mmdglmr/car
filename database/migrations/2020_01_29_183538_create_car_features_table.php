`       X`<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('engine_volume')->nullable();
            $table->string('engine_power')->nullable();
            $table->string('number_of_cylinders')->nullable();//teadade cylaandr
            $table->string('number_of_valves')->nullable();//sopap
            $table->string('torque')->nullable();//gashtavar
            $table->string('acceleration')->nullable();//shetab
            $table->string('max_speed')->nullable();
            $table->string('gearbox')->nullable();//girbox chand dande
            $table->string('differential')->nullable();//defransiel aghab jolo both
            $table->string('car_dimensions')->nullable();//abaade khodro
            $table->string('axis_spacing')->nullable();//fasle mehvar
            $table->string('fuel_consumption')->nullable();//masrafe sokht
            $table->string('fuel_tank_capacity')->nullable();
            $table->text('safety')->nullable();//amniaati mese abs o kise havao
            $table->text('options')->nullable();
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
        Schema::dropIfExists('car_features');
    }
}
