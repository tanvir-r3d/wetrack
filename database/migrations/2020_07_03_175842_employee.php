<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->string('emp_full_name', 50)->nullable();
            $table->string('emp_gender', 30)->nullable();
            $table->string('emp_address', 100)->nullable();
            $table->integer('emp_phone')->nullable();
            $table->integer('emp_salery')->nullable();
            $table->string('emp_username', 100)->unique();
            $table->string('emp_email', 200)->unique();
            $table->string('emp_password', 500)->unique();
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
        Schema::dropIfExists('employee');
    }
}

