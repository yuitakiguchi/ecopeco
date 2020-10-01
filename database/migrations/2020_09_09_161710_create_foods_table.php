<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('price_difference');
            $table->text('image_name')->nullable();
            $table->text('public_id')->nullable();
            $table->text('name');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->time('trading_time');
            $table->date('trading_date');
            $table->integer('coupon');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foods');
        $table->dropColumn('image_path');
        $table->dropColumn('public_id');
    }
}
