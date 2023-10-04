<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesBatterysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_batterys', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->string('battery_1');
            $table->string('battery_2');
            $table->string('battery_3');
            $table->string('battery_4');
            $table->string('battery_5');
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
        Schema::dropIfExists('vehicles_batterys');
    }
}
