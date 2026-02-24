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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('folio', 50)->unique();
            $table->string('name', 250)->nullable();
            $table->string('last_name',250);
            $table->string('legal_name', 250)->nullable();
            $table->string('rfc', 15)->nullable();
            $table->string('fiscal_address_zip', 10)->nullable();
            $table->string('tax_regime', 5)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('address', 250)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
