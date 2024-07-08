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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumb_image');
            $table->integer('price');
            $table->integer('discount_price');
            $table->text('description');
            $table->boolean('status');
            $table->integer('inventory_quantity');
            $table->integer('input_quantity');
            $table->integer('output_quantity');
            $table->integer('category_id');
            $table->integer('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
