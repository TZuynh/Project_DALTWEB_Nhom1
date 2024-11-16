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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_detail_id')->constrained('product_details');
            $table->foreignId('shipment_status_id')->constrained('shipment_statuses');
            $table->foreignId('voucher_id')->constrained('vouchers');
            $table->integer('price')->nullable();
            $table->integer('quality')->nullable();
            $table->integer('total_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
