<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('authority_id');
            $table->text('image_name')->nullable();
            $table->text('public_id')->nullable();
            $table->string('address')->nullable();
            $table->text('hp_url')->nullable();
            $table->text('introduction')->nullable();
            $table->string('phone_number')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('authority_id')->references('id')->on('authorities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
