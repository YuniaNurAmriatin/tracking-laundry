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
        Schema::create('notifications', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')
          ->constrained('laundry_orders')
          ->cascadeOnDelete();
    $table->foreignId('customer_id')
          ->constrained()
          ->cascadeOnDelete();
    $table->text('pesan');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
