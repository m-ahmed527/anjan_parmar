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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('product_name')->nullable();
            $table->string('variant_id')->nullable();
            $table->string('variant_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('product_price')->nullable();
            $table->float('variant_price')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
