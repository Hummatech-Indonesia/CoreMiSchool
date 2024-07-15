<?php

use App\Enums\DayEnum;
use App\Enums\RoleEnum;
use App\Traits\Migrations\HasForeign;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasForeign;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance_rules', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'school_id');
            $table->enum('day', [DayEnum::MONDAY->value, DayEnum::TUESDAY->value, DayEnum::WEDNESDAY->value, DayEnum::THRUSDAY->value, DayEnum::FRIDAY->value, DayEnum::SATURDAY->value, DayEnum::SUNDAY->value]);
            $table->enum('role', [RoleEnum::STUDENT->value, RoleEnum::TEACHER->value]);
            $table->time('checkin_start');
            $table->time('checkin_end');
            $table->time('checkout_start');
            $table->time('checkout_end');
            $table->boolean('is_holiday')->default(false);
            $table->unique(['day']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_rules');
    }
};
