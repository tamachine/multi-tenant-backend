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
        Schema::create('seo_schemas', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->enum('type', config('seo-schemas'));
            $table->unsignedBigInteger('seo_configuration_id')->unsigned();
            $table->json('schema');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seo_configuration_id')->references('id')->on('seo_configurations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_schemas');
    }
};
