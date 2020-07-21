<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserTable extends Migration
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
            $table->string('user_first_name', 1000)->nullable();
            $table->string('user_last_name' ,1000)->nullable();
            $table->string('user_gender', 1000)->nullable();
            $table->string('user_contact', 1000)->nullable();
            $table->string('username', 1000);
            $table->string('remember_token', 100)->nullable();
            $table->string('email', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' ,1000);
            $table->string('user_img',1000);
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
        Schema::dropIfExists('users');
    }
}
