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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('folio', 50)->unique();
            $table->timestamp('sale_date')->useCurrent();
            $table->foreignId('user_id')->constrained()->onDelete('no action');
            $table->foreignId('customer_id')->constrained()->onDelete('no action');
            $table->decimal('total_qty', 10,2)->default(0);
            $table->decimal('total_subtotal', 12,2)->default(0);
            $table->decimal('total_taxes', 12,2)->default(0);
            $table->decimal('total_amount', 12,2)->default(0);
            $table->string('payment_method', 5)->nullable();
            $table->enum('status', ['draft', 'pending', 'completed', 'cancelled'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
