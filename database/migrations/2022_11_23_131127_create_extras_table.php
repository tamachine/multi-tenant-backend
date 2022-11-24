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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->boolean('active')->default(0);
            $table->unsignedBigInteger('vendor_id')->unsigned()->index();
            $table->text('name');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('order_appearance')->default(15);
            $table->string('image')->nullable();

            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('maximum_fee')->default(800000);
            $table->unsignedSmallInteger('max_units')->default(1);
            $table->string('price_mode')->default('per_day');
            $table->string('category')->default('standard');

            $table->boolean('included')->default(0);
            $table->boolean('insurance_premium')->default(0);

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
        Schema::dropIfExists('extras');
    }
};
