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
            $table->string('sku', 50)->nullable();
            $table->string('barcode', 30)->nullable();
            $table->string('name', 150);
            $table->decimal('cost_price', 12, 2)->default(0);
            $table->decimal('sale_price', 12, 2)->default(0);
            $table->decimal('stock_qty', 12, 3)->default(0);
            $table->decimal('min_stock_alert', 12, 3)->default(0);
            $table->string('tax_object', 2)->nullable();
            $table->string('fiscal_product_code', 20)->nullable();
            $table->string('fiscal_unit_code', 10)->nullable();
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
