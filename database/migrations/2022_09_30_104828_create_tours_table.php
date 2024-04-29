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
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('tour_commander_id')->unsigned()->nullable();
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->string('user_name')->nullable();
            $table->string('tour_name');
            $table->string('tour_date');
            $table->string('weather');
            $table->string('road_condition');
            //$table->string('petrol_man');
            $table->string('radio')->nullable();
            $table->string('post')->nullable();
            $table->string('fob_1')->nullable();
            $table->string('fob_2')->nullable();
            $table->string('fob_3')->nullable();
            $table->string('fob_4')->nullable();
            $table->string('ring_1')->nullable();
            $table->string('ring_2')->nullable();
            $table->string('ring_3')->nullable();
            $table->string('ring_4')->nullable();
            $table->string('vehicle_1');
            $table->string('vehicle_2');
            $table->string('vehicle_3');
            $table->string('vehicle_4');
            $table->string('vehicle_5')->nullable();
            $table->string('vehicle_6')->nullable();
            $table->string('status')->nullable()->default('unlocked');
            $table->text('comment')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
