<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_header', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id');
            $table->string('supplier_name');
            $table->string('supplier_contact_no');
            $table->integer('store_id');
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
        Schema::dropIfExists('sale_header');
    }
}
