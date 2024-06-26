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
            $table->id("ProductID");
            $table->string('ProductName',225);
            $table->string('Speed', 50);
            $table->string('Bandwidth', 50);
            $table->BigInteger('Price');
            $table->BigInteger('NTPrice');
            $table->integer('sort');
            $table->longText('Gift');
            $table->longText('Description');
            $table->string('IPstatic', 50);
            $table->integer('UseDay');
            $table->unsignedBigInteger('CategoryID');
            $table->unsignedBigInteger('ServiceID')->nullable();
            $table->timestamps();
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');
            $table->foreign('ServiceID')->references('ServiceID')->on('services');
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