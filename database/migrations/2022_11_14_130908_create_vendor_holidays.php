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
        Schema::create('vendor_holidays', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('pickup_from');
            $table->time('pickup_to');
            $table->time('dropoff_from');
            $table->time('dropoff_to');
            $table->boolean('closed')->default(0);
            $table->unsignedBigInteger('vendor_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendor_holidays');
    }
};
