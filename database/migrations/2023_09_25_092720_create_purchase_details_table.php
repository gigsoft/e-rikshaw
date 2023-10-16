<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('store_id');
            $table->integer('item_id');
            $table->integer('vehicle_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Use 'decimal' for precise currency values
            $table->decimal('tax', 10, 2); // Use 'decimal' for precise currency values
            $table->decimal('total_price', 10, 2); // Use 'decimal' for precise currency values
            $table->enum('status',['0','1','2']);
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
        Schema::dropIfExists('purchase_details');
    }
}
