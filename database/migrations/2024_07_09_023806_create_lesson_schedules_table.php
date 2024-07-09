<?php

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
        Schema::create('lesson_schedules', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'classroom_id');
            $this->addForeignIdTo($table, 'lesson_hour_start', 'lesson_hours');
            $this->addForeignIdTo($table, 'lesson_hour_end', 'lesson_hours');
            $this->addForeignId($table, 'teacher_maple_id');
            $this->addForeignId($table, 'school_year_id');
            $table->date('day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_schedules');
    }
};
