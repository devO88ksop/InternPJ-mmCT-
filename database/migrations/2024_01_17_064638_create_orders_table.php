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
        Schema::create('orders', function (Blueprint $table) 
        {
            $table->id();
            $table->string('date');
            $table->string('Voucher_no');
            $table->string('status')->nullable();
            $table->string('order_status')->nullable();
            $table->string('shipping_address');
            $table->string('shipping_phone');
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
