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
            $table->id();
            $table->string('line_id')->nullable();
            $table->string('name'); // ชื่อจริง - First Name
            $table->string('surname'); // นามสกุล - Last Name
            $table->string('nickname')->nullable(); // ชื่อเล่น - Nickname
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // เพศ - Gender
            $table->date('birthdate')->nullable(); // วันเกิด - Birthdate
            $table->decimal('weight', 5, 2)->nullable(); // น้ำหนัก (ก.ก.) - Weight in kilograms
            $table->smallInteger('height')->nullable(); // ส่วนสูง (ซ.ม.) - Height in centimeters
            $table->string('work_type')->nullable(); // ทำงานประเภท - Type of work
            $table->json('interests')->nullable(); // Stores an array of selected interests
            $table->enum('exercise_frequency', ['frequent', '1-2-days', 'none'])->nullable(); // การออกกำลังกาย - Exercise frequency
            $table->enum('sleep_pattern', ['more-8', '6-8', 'less-8'])->nullable(); // การนอน - Sleep pattern
            $table->enum('meals_per_day', ['3time', '2time', '1time'])->nullable(); // รับประทารอาหารต่อวัน - Meals per day
            $table->text('food_allergies')->nullable(); // ประวัติการแพ้อาหาร - Food allergy history
            $table->string('underlying_disease')->nullable(); // โรคประจำตัว - Underlying disease
             // Health-related fields
            $table->enum('blood_type', ['A', 'B', 'AB', 'O'])->nullable(); // กรุ๊ปเลือด - Blood type
            $table->decimal('blood_ldl', 8, 2)->nullable(); // ค่าเลือด LDL - Blood LDL level
            $table->decimal('blood_hfl', 8, 2)->nullable(); // ค่าเลือด HFL - Blood HFL level
            $table->text('regular_medication')->nullable(); // ยาประจำตัว - Regular medication
            $table->text('side_effects')->nullable(); // อาการข้างเคียง - Side effects
            $table->enum('defecation_pattern',['regularly','3-4days','sometime','always'])->nullable(); // ขับถ่าย - Defecation pattern (might want to use a more appropriate column type based on the options)
            $table->text('other_health_info')->nullable(); // อื่นๆ - Other health-related information
            $table->json('health_documents')->nullable(); // เอกสารสุขภาพ - Health documents (stored as a JSON array of file paths or identifiers)
            $table->string('email')->nullable(); // Email address
            $table->timestamp('email_verified_at')->nullable(); // Email verification timestamp
            $table->string('password')->nullable(); // Password
            $table->rememberToken(); // Remember me token for login
            $table->timestamps(); // Timestamps for created_at and updated_at
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