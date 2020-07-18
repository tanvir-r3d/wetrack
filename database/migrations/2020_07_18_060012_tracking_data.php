<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrackingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_datas', function (Blueprint $table) {
        $table->bigIncrements('tracking_id');
        $table->integer('user_id');
        $table->string('tracking_longitude', 1000);
        $table->string('tracking_latitude', 1000);
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
        Schema::dropIfExists('tracking_datas');

    }
}
