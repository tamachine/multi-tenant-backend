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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->unsignedBigInteger('car_id')->nullable()->unsigned()->index();
            $table->unsignedBigInteger('vendor_id')->nullable()->unsigned()->index();
            $table->string('status')->default('pending')->index();
            $table->string('cancel_reason')->nullable();
            $table->string('car_name');
            $table->string('vendor_name');

            $table->string('pickup_name');
            $table->string('dropoff_name');
            $table->timestamp('pickup_at')->nullable();
            $table->timestamp('dropoff_at')->nullable();
            $table->unsignedBigInteger('pickup_location')->nullable()->unsigned()->index();
            $table->unsignedBigInteger('dropoff_location')->nullable()->unsigned()->index();

            $table->unsignedInteger('rental_price')->nullable();
            $table->unsignedInteger('exrtras_price')->nullable();
            $table->unsignedInteger('total_price')->nullable();
            $table->unsignedInteger('online_payment')->nullable();

            $table->string('order_number')->nullable()->index();
            $table->float('amount_paid', 10, 2)->nullable();
            $table->string('currency_paid')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->default('pending')->index();
            $table->string('vendor_status')->default('pending')->index();
            $table->string('pickup_input_info')->nullable();
            $table->string('dropoff_input_info')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->unsignedTinyInteger('number_passengers')->default(1);
            $table->string('driver_name')->nullable();
            $table->string('driver_date_birth')->nullable();
            $table->string('driver_id_passport')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('weight_info')->nullable();
            $table->string('extra_driver_info1')->nullable();
            $table->string('extra_driver_info2')->nullable();
            $table->string('extra_driver_info3')->nullable();
            $table->string('extra_driver_info4')->nullable();
            $table->boolean('newsletter')->default(0);

            $table->unsignedBigInteger('affiliate_id')->nullable()->unsigned()->index();
            $table->unsignedInteger('affiliate_commission')->nullable();

            $table->string('caren_id')->nullable()->index();
            $table->string('caren_guid')->nullable();
            $table->text('caren_info')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('set null');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            $table->foreign('pickup_location')->references('id')->on('locations')->onDelete('set null');
            $table->foreign('dropoff_location')->references('id')->on('locations')->onDelete('set null');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
