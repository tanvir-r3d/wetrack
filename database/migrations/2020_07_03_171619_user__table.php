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
        Schema::create('User_Table', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('user_first_name', 20)->nullable();
            $table->string('user_last_name' ,20)->nullable();
            $table->string('user_gender', 10)->nullable();
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' ,50);
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
        Schema::dropIfExists('User_Table');
    }
}