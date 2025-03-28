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
        Schema::create('variants', function (Blueprint $table) {
            // $table->id();
            // $table->foreignId('attribute_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->string('slug');
            // $table->string('name');
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // $table->string('sku')->unique()->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
