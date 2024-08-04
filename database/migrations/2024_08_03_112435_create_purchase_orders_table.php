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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id('purchase_id');
            $table->string('invoice_no');
            $table->integer('user_id');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('status');
            $table->string('paymet_method')->default('BY CASH');
            $table->string('shipping_method')->default('COD');
            $table->string('supplier_name');
            $table->string('supplier_city');
            $table->string('phone');
            $table->string('address');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
