<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('slug',50)->unique(); 
            $table->foreignId('user_id')->on('users');
            $table->foreignId('category_id')->on('categories');
            $table->string('thumbnail',30)->default('default.png');
            $table->date('publish_date');
            $table->boolean('publish')->default(false);
            $table->string('meta_desc',200);
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
