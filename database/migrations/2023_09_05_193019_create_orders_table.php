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
            $table->id('OrderID');
            $table->boolean('Accept');
            $table->string('name', 225);
            $table->char('Phone', 11);
            // $table->string('email', 225)->unique()->nullable();
            $table->date('DateStart');
            $table->unsignedBigInteger('CityID');
            $table->unsignedBigInteger('DistrictID');
            $table->string('Address', 225);
            // $table->unsignedBigInteger('UserID')->nullable();
            $table->unsignedBigInteger('PaymentID')->nullable();
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('ServiceID')->nullable();
            $table->timestamps();
            // $table->foreign('UserID')->references('id')->on('users');
            $table->foreign('DistrictID')->references('DistrictID')->on('districts');
            $table->foreign('CityID')->references('CityID')->on('cities');
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