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
        Schema::create('car_free_day', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->unsigned()->index();
            $table->unsignedBigInteger('free_day_id')->unsigned()->index();

            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('free_day_id')->references('id')->on('free_days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_free_day');
    }
};
