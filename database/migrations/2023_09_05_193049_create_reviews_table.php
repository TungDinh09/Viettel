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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('reviewID');
            $table->string('Comment', 225);
            $table->integer('Rate');
            $table->unsignedBigInteger('ProductID');
            $table->unsignedBigInteger('UserID');
            $table->timestamps();

            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->foreign('UserID')->references('UserID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};