<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuranterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guranter', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->string('name');
            $table->text('profile_image');
            $table->text('adhar_card');
            $table->text('pan_card');
            $table->string('contact_1');
            $table->string('contact_2');
             $table->string('contact_3');
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
        Schema::dropIfExists('guranter');
    }
}
