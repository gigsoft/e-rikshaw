<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_header', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->integer('supplier_name');
            $table->decimal('supplier_contact_no');
            $table->date('date');
            $table->decimal('amount', 10, 2); // Use 'decimal' for precise currency values
            $table->decimal('tex_amount', 10, 2); // Use 'decimal' for precise currency values
            $table->decimal('total_amount', 10, 2); // Use 'decimal' for precise currency values
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
        Schema::dropIfExists('purchase_header');
    }
}
