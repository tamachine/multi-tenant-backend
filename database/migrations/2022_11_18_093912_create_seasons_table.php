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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->string('name');
            $table->unsignedBigInteger('vendor_id')->unsigned()->index();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedTinyInteger('min_days_season')->default(1);
            $table->unsignedTinyInteger('season_discount')->default(0);
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
        Schema::dropIfExists('seasons');
    }
};
