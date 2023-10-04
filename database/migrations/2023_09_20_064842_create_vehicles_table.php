<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
                        $table->id();
                        $table->integer('model_id');
                        $table->string('name');
                        $table->date('date');
                        $table->string('color');
                        $table->decimal('sales_price', 10, 2); // Use 'decimal' for precise currency values
                        $table->decimal('bill_price', 10, 2); // Use 'decimal' for precise currency values
                        $table->string('engine_no');
                        $table->string('chassie_print');
                        $table->decimal('down_payment', 10, 2); // Use 'decimal' for precise currency values
                        $table->string('financed_by');
                        $table->date('insurance_amount_date'); // Use 'date' for date values
                        $table->decimal('emi_amount', 10, 2); // Use 'decimal' for precise currency values
                        $table->string('udhar');
                        $table->string('rc_status');
                        $table->string('pending_payment');
                        $table->string('advance_payment');
                        $table->enum('cashFinance',['cash','finance']);
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
        Schema::dropIfExists('vehicles');
    }
}
