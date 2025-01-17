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
        Schema::create('tour_officers', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id')->unsigned()->nullable();
            $table->integer('officer_id')->unsigned()->nullable();
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
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
        Schema::dropIfExists('tour_officers');
    }
};
