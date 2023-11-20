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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id("BlogID");
            $table->longText('BlogContent');
            $table->string('BlogTilte', 225);
            $table->string('TilteImage', 225);
            $table->unsignedBigInteger('AdminID');
            $table->timestamps();

            $table->foreign('AdminID')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};