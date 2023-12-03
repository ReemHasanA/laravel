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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('messege');
            $table->foreignId('statuses_id')->unsigned()->references('id')->on('statuses')->onDelete('cascade');//->default(2) prefer to put in controller or in form as ahidden input
            $table->foreignId('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('employee_id')->unsigned()->references('id')->on('employees')->onDelete('cascade');
            $table->foreignId('priority_id')->unsigned()->references('id')->on('priorties')->onDelete('cascade');//->default(2) prefer to put in controller or in form as ahidden input
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
        Schema::dropIfExists('tickets');
    }
};
