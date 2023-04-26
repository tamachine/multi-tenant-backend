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
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('featured_image')->nullable()->after('description');
            $table->unsignedBigInteger('featured_image_hover')->nullable()->after('featured_image');
        });

        Schema::dropIfExists('car_images');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('featured_image');
            $table->dropColumn('featured_image_hover');
        });

        Schema::create('car_images', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->boolean('main')->default(0);
            $table->string('file_name');
            $table->string('file_type');
            $table->unsignedBigInteger('car_id');
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }
};
