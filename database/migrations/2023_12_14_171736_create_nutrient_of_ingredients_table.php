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
        Schema::create('nutrient_of_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('codenoi')->unique(); // 'รหัสสารอาหารของวัตถุดิบ' - Unique code for the recipe
            $table->string('name'); // 'ชื่อสารอาหารของวัตถุดิบ' - Name of the recipe
            // Additional fields for recipe details can be added here
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrient_of_ingredients');
    }
};
