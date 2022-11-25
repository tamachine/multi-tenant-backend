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
        Schema::create('caren_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('caren_rental_id')->unsigned()->index();
            $table->unsignedBigInteger('vendor_id')->nullable()->unsigned()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caren_vendors');
    }
};
