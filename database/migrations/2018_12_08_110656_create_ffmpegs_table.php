<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFfmpegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ffmpegs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_id');
            $table->longText('patch');
            $table->string('size')->default('240:-2');
            $table->string('audio')->default('96k');
            $table->string('bitrate')->default('410K');
            $table->string('format')->default('mp4');
            $table->string('status')->default('waiting');
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
        Schema::dropIfExists('ffmpegs');
    }
}
