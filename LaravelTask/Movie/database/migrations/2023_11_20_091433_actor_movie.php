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
        Schema::create("actor_movie", function (Blueprint $table) {
            $table->foreignId('actor_id')->unsigned()->references('id')->on('actors')->cascadeOnDelete;
            $table->foreignId('movie_id')->unsigned()->references('id')->on('movies')->onDelete('cascade');
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
        Schema::dropIfExists('actor_movie');
    }
};
