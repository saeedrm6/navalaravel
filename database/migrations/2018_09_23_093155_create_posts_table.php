<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('seo')->nullable();
            $table->string('status')->default('inherit');
            $table->string('comment_status')->default('open');
            $table->string('post_type')->default('post');
            $table->integer('views')->default(0);
            $table->float('rate')->default(0);
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
