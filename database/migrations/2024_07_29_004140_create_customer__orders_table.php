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
        Schema::create('customer__orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->integer('user_id');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('status')->default(false);
            $table->string('shipping_method')->default('COD');
            $table->string('payment_method')->default('BY CASH');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer__orders');
    }
};
