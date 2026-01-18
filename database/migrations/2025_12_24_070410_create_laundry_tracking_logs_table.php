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
        Schema::create('laundry_tracking_logs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('order_id')
          ->constrained('laundry_orders')
          ->cascadeOnDelete();
    $table->foreignId('tracking_status_id')
          ->constrained('tracking_statuses');
    $table->text('catatan')->nullable();
    $table->dateTime('waktu_update');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry_tracking_logs');
    }
};
