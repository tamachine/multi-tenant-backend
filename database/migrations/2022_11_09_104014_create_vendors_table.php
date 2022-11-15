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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->string('name', 80);
            $table->integer('service_fee')->default(0);
            $table->string('vendor_code', 11);
            $table->string('status', 10)->default('active');
            $table->string('brand_color', 9)->default('#249e8f');
            $table->string('logo')->nullable();
            $table->text('long_rental')->nullable();
            $table->text('early_bird')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
