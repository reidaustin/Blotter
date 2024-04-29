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
        Schema::create('daily_blotters', function (Blueprint $table) {
            $table->id();
            //$table->integer('tour_commander_id')->unsigned()->nullable();
            //$table->integer('supervisor_id')->unsigned()->nullable();
            $table->integer('tour_id')->unsigned()->nullable();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->integer('job_final_id')->unsigned()->nullable();
            $table->integer('crime_id')->unsigned()->nullable();
            $table->integer('person_request_id')->unsigned()->nullable();
            $table->integer('medical_request_id')->unsigned()->nullable();
            $table->integer('code_alarm_id')->unsigned()->nullable();
            $table->integer('other_id')->unsigned()->nullable();
            $table->integer('building_id')->unsigned()->nullable();
            $table->integer('parking_lot_id')->unsigned()->nullable();
            $table->integer('area_id')->unsigned()->nullable();
            $table->integer('incident_type_id')->unsigned()->nullable();
            $table->string('entry_number');
            $table->string('time');
            $table->string('duty_officer')->nullable();
            $table->string('comment');
            //$table->date('date');
            //$table->string('tour');
            //$table->string('tour_commander');
            //$table->string('supervisor');
            // $table->string('weather');
            // $table->string('road_condition');
            // $table->string('gate_cards')->nullable();
            // $table->string('gas_cards')->nullable();
            // $table->string('ct_key')->nullable();
            // $table->string('supervisor_key')->nullable();
            // $table->string('vehicle_1');
            // $table->string('vehicle_2');
            // $table->string('vehicle_3');
            // $table->string('vehicle_4');
            // $table->string('vehicle_5');
            // $table->string('vehicle_6');
            // $table->string('petrol_man');
            // $table->string('radio');
            // $table->string('post');
            //$table->foreign('tour_commander_id')->references('id')->on('tour_commanders')->onDelete('cascade');
            //$table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('cascade');
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('job_final_id')->references('id')->on('job_finals')->onDelete('cascade');
            $table->foreign('crime_id')->references('id')->on('crimes')->onDelete('cascade');
            $table->foreign('person_request_id')->references('id')->on('person_requests')->onDelete('cascade');
            $table->foreign('medical_request_id')->references('id')->on('medical_requests')->onDelete('cascade');
            $table->foreign('code_alarm_id')->references('id')->on('code_alarms')->onDelete('cascade');
            $table->foreign('other_id')->references('id')->on('others')->onDelete('cascade');
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->foreign('parking_lot_id')->references('id')->on('parking_lots')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('incident_type_id')->references('id')->on('incident_types')->onDelete('cascade');
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
        Schema::dropIfExists('daily_blotters');
    }
};
