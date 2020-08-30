<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Branch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('branch_id');
            $table->unsignedBigInteger('com_id');
            $table->string('branch_name', 1000);
            $table->string('branch_location', 1000);
            $table->string('branch_details',1000)->nullable();
            $table->timestamps();
           
            $table->foreign('com_id')
            ->references('com_id')->on('companies')
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
        Schema::dropIfExists('branches');
    }
}
