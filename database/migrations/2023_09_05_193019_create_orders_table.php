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
            $table->id('Orders');
            $table->decimal('ProductPrice', 10, 2);
            $table->boolean('Accept');
            $table->date('DateStart');
            $table->decimal('ServicePrice', 10, 2)->nullable();
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('PaymentID')->nullable();
            $table->string('ProductID');
            $table->unsignedBigInteger('ServiceID')->nullable();
            $table->timestamps();

            $table->foreign('UserID')->references('UserID')->on('users');
            $table->foreign('PaymentID')->references('PaymentID')->on('payments');
            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->foreign('ServiceID')->references('ServiceID')->on('services');
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