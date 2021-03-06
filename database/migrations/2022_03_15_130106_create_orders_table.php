<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
//            $table->unsignedBigInteger('food_id');
            $table->date('date');
            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('movie_id')->references('id')->on('movies');
//            $table->foreign('food_id')->references('id')->on('food');
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
        Schema::dropIfExists('orders');
    }
}
