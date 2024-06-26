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
       Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 225)->unique();
            $table->string('email', 225)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 225);
            $table->char('Phone', 255);
            $table->string('Avatar', 225)->nullable();
            $table->char('Gender', 1);
            $table->string('Address', 225);
            $table->date('DateOfBirth')->nullable();
            $table->string('Firstname', 225)->nullable();
            $table->string('LastName', 225)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
