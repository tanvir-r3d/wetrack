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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->string('emp_full_name', 1000);
            $table->integer('emp_com_id');
            $table->integer('emp_branch_id')->unsigned();
            $table->integer('emp_cat_id')->unsigned();
            $table->string('emp_gender', 1000);
            $table->string('emp_address', 1000)->nullable();
            $table->string('emp_phone');
            $table->integer('emp_salery')->nullable();
            $table->string('emp_img',1000)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
