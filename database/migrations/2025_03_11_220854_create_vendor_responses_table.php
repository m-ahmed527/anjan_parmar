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
        Schema::create('vendor_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_request_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('response_id');
            $table->text('reply');
            $table->enum('status', ['sent', 'received'])->default('sent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_responses');
    }
};
