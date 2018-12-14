<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('music_set_id');
            $table->string('path');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('music_set_id')->references('id')->on('music_sets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_files');
    }
}
