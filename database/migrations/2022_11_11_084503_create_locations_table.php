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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->text('name');
            $table->boolean('pickup_show_input')->default(0);
            $table->boolean('dropoff_show_input')->default(0);
            $table->boolean('pickup_input_require')->default(0);
            $table->boolean('dropoff_input_require')->default(0);
            $table->text('pickup_input_info')->nullable();
            $table->text('dropoff_input_info')->nullable();
            $table->unsignedTinyInteger('order_appearance')->default(15);
            $table->text('caren_settings')->nullable();

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
        Schema::dropIfExists('locations');
    }
};
