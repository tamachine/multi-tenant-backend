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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->boolean('active')->default(0);
            $table->unsignedBigInteger('vendor_id')->unsigned()->index();
            $table->text('name');
            $table->string('car_code', 4)->nullable();
            $table->text('description')->nullable();
            $table->year('year')->nullable(now()->year);

            $table->unsignedTinyInteger('ranking')->default(8);
            $table->unsignedSmallInteger('fleet_position')->default(12);
            $table->unsignedSmallInteger('users_number_votes')->default(100);
            $table->unsignedSmallInteger('min_preparation_time')->default(30);
            $table->unsignedTinyInteger('min_days_booking')->default(1);
            $table->unsignedTinyInteger('adult_passengers')->default(4);
            $table->unsignedTinyInteger('doors')->default(4);
            $table->unsignedTinyInteger('luggage')->default(3);
            $table->unsignedTinyInteger('units')->default(15);
            $table->unsignedTinyInteger('online_percentage')->default(20);
            $table->unsignedTinyInteger('discount_percentage')->default(0);
            $table->unsignedTinyInteger('beds')->default(2);

            $table->boolean('km_unlimited')->default(1);
            $table->boolean('bath_shower')->default(1);
            $table->boolean('kitchen')->default(1);
            $table->boolean('heater')->default(1);
            $table->boolean('cdw_insurance')->default(1);
            $table->boolean('driver_extra')->default(1);

            $table->string('engine')->default('gas');
            $table->string('transmission')->default('manual');
            $table->string('vehicle_type')->default('medium');
            $table->string('vehicle_brand')->default('hyundai');
            $table->string('f_roads_name')->default('fwd');
            $table->string('vehicle_class')->default('car');

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('cars');
    }
};
