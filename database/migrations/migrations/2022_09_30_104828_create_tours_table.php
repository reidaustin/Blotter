<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_commander_id')->unsigned()->nullable();
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->string('tour_name');
            $table->date('tour_date');
            $table->string('weather');
            $table->string('road_condition');
            //$table->string('petrol_man');
            $table->string('radio');
            $table->string('post');
            $table->string('gate_cards')->nullable();
            $table->string('gas_cards')->nullable();
            $table->string('ct_key')->nullable();
            $table->string('supervisor_key')->nullable();
            $table->string('vehicle_1');
            $table->string('vehicle_2');
            $table->string('vehicle_3');
            $table->string('vehicle_4');
            $table->string('vehicle_5');
            $table->string('vehicle_6');
            $table->foreign('tour_commander_id')->references('id')->on('tour_commanders')->onDelete('cascade');
            $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
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
        Schema::dropIfExists('tours');
    }
};
