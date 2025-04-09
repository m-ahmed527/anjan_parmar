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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->uuid('order_id')->unique();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('order_status')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('total')->nullable();
            $table->float('shipping_amount')->nullable();
            $table->string('shipment_status')->nullable();
            $table->float('tax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
