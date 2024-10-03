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
            $table->string('bank_account');
            $table->date(column: 'date');
            $table->string('saleman');
            $table->string('payment_user');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('shipping_cost', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('total_pay_cost', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->string('customer_name');
            $table->string('customer_phone_number');
            $table->string('reffer_type');
            $table->string('address');
            $table->string('postal_code');
            $table->string('shipping_man')->nullable();
            $table->date('shipping_date')->nullable();
            $table->string('tracking_code')->nullable(); // Renamed from 'Tracking-Code'
            $table->string('shipping_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_models');
    }
};
