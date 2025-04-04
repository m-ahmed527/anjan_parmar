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
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('slug');
            $table->string('name');
            $table->string('search_keywords')->nullable();
            $table->float('price');
            $table->float('discount')->nullable();
            $table->string('discount_type')->default('price');
            $table->text('description')->nullable();
            $table->string('long_description')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('is_premium')->default(0);
            $table->softDeletes();
            $table->timestamps();
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
