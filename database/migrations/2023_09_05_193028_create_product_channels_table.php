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
        Schema::create('product_channels', function (Blueprint $table) {
            $table->id('product_channelID');
            $table->unsignedBigInteger('ChannelID');
            $table->unsignedBigInteger('ProductID');
            $table->timestamps();

            $table->foreign('ChannelID')->references('ChannelID')->on('channels');
            $table->foreign('ProductID')->references('ProductID')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_channels');
    }
};