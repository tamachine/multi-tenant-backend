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
        Schema::create('caren_car_caren_extra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('caren_car_id')->unsigned()->index();
            $table->unsignedBigInteger('caren_extra_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('caren_car_id')->references('id')->on('caren_cars')->onDelete('cascade');
            $table->foreign('caren_extra_id')->references('id')->on('caren_extras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caren_car_caren_extra');
    }
};
