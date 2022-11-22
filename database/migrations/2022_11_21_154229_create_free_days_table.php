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
        Schema::create('free_days', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->string('name');
            $table->unsignedSmallInteger('min_days');
            $table->unsignedSmallInteger('max_days');
            $table->unsignedSmallInteger('days_for_free');

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
        Schema::dropIfExists('free_days');
    }
};
