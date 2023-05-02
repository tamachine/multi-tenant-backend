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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->index();
            $table->text('title');
            $table->text('slug');
            $table->boolean('published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->text('summary', 1024)->nullable();
            $table->text('content')->nullable();
            $table->unsignedBigInteger('featured_image')->nullable();
            $table->unsignedBigInteger('blog_author_id')->nullable()->unsigned()->index();
            $table->unsignedBigInteger('blog_category_id')->nullable()->unsigned()->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('blog_author_id')->references('id')->on('blog_authors')->onDelete('set null');
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
};
