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
        Schema::create('car_location', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->unsigned()->index();
            $table->unsignedBigInteger('location_id')->unsigned()->index();
            $table->time('open_from');
            $table->time('open_to');
            $table->boolean('pickup_available')->default(0);
            $table->boolean('dropoff_available')->default(0);

            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_location');
    }
};
