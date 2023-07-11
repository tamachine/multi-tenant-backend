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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->text('name');
            $table->timestamps();
        });
        
        Schema::create('feature_insurance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insurance_id')->unsigned()->index();
            $table->unsignedBigInteger('feature_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('insurance_id')->references('id')->on('extras')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_feature');
        Schema::dropIfExists('features');
    }
};
