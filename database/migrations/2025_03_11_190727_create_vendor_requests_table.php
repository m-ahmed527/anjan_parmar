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
        Schema::create('vendor_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_id');
            $table->foreignId('vendor_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('subject');
            $table->text('message');
            $table->enum('status', ['requested', 'responded'])->default('requested');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_requests');
    }
};
