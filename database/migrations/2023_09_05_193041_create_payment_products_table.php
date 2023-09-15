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
        Schema::create('payment_products', function (Blueprint $table) {
            $table->id('payment_productID');
            $table->unsignedBigInteger('PaymentID');
            $table->unsignedBigInteger('ProductID');
            $table->timestamps();

            $table->foreign('PaymentID')->references('PaymentID')->on('payments');
            $table->foreign('ProductID')->references('ProductID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_products');
    }
};
