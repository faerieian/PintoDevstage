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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to the users table
            $table->text('main_address'); // ที่อยู่หลัก - Main Address
            $table->string('location')->nullable(); // Share Location for the main address
            $table->string('phone', 20)->nullable(); // เบอร์มือถือ - Phone number for the main address
            $table->text('secondary_address')->nullable(); // ที่อยู่รอง (ถ้ามี) - Secondary Address
            $table->string('secondary_location')->nullable(); // Share Location for the secondary address
            $table->string('secondary_phone', 20)->nullable(); // เบอร์มือถือ for the secondary address
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};