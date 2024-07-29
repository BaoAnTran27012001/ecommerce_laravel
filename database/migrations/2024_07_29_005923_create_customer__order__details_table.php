<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer__order__details', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('delivered_quantity')->default(0);
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer__order__details');
    }
};
