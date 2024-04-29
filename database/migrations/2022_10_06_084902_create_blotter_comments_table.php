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
        Schema::create('blotter_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('blotter_id')->unsigned()->nullable();
            $table->text('comment')->nullable();
            $table->string('time')->nullable();
            $table->foreign('blotter_id')->references('id')->on('daily_blotters')->onDelete('cascade');
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
        Schema::dropIfExists('blotter_comments');
    }
};
