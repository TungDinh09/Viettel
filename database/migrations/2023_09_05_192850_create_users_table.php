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
        Schema::create('users', function (Blueprint $table) {
         

            $table->id("UserID");
            $table->string('name', 225)->unique();
            $table->string('email', 225)->unique();
            $table->string('password', 225);
            $table->char('Phone', 11);
            $table->string('Avatar', 225)->nullable();
            $table->char('Gender', 1);
            $table->string('Address', 225);
            $table->date('DateOfBirth');
            $table->string('FirstName', 50);
            $table->string('LastName', 50);
            $table->unsignedBigInteger('CityID');
            $table->unsignedBigInteger('DistrictID');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('CityID')->references('id')->on('cities');
            $table->foreign('DistrictID')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};