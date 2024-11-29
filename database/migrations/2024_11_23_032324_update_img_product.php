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
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreignId('color_id')
                ->nullable() // Cho phép null
                ->change();  // Sửa cột hiện có
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};