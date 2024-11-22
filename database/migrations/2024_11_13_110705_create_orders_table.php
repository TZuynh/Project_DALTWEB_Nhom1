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
            $table->foreignId('shipping_address_id')->constrained('shipping_addresses');
            $table->foreignId('shipment_status_id')->constrained('shipment_statuses');
            $table->foreignId('voucher_id')->constrained('vouchers');
            $table->integer('total_product_value',)->nullable();
            $table->integer('charge')->nullable();
            $table->integer('total_order_value')->nullable();
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
