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
            $table->unsignedBigInteger('emp_com_id');
            $table->unsignedBigInteger('emp_branch_id')->unsigned();
            $table->unsignedBigInteger('emp_cat_id')->unsigned();
            $table->string('emp_gender', 1000);
            $table->string('emp_address', 1000)->nullable();
            $table->string('emp_phone');
            $table->integer('emp_salery')->nullable();
            $table->string('emp_img',1000)->nullable();
            $table->string('emp_status',3)->nullable();
            $table->timestamps();

            $table->foreign('emp_com_id')
            ->references('com_id')->on('companies')
            ->onDelete('cascade');

            $table->foreign('emp_branch_id')
            ->references('branch_id')->on('branches')
            ->onDelete('cascade');

            $table->foreign('emp_cat_id')
            ->references('emp_cat_id')->on('employee_categorys')
            ->onDelete('cascade');
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
