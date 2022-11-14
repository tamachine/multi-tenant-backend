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
        Schema::create('vendor_location_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id')->unsigned()->index();
            $table->unsignedBigInteger('location_pickup')->unsigned()->index();
            $table->unsignedBigInteger('location_dropoff')->unsigned()->index();
            $table->integer('fee')->default(0);

            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('location_pickup')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('location_dropoff')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_location_fees');
    }
};
