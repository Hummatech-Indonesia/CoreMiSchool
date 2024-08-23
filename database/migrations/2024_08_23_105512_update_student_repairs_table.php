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
        Schema::table('student_repairs', function (Blueprint $table) {
            $table->dropForeign(['repair_id']);
            $table->dropColumn('repair_id');
            $table->longText('repair')->after('classroom_student_id');
            $table->integer('point')->default(0)->after('repair');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_repairs', function (Blueprint $table) {
            $table->foreignId('repair_id')->constrained()->after('classroom_student_id');
            $table->dropColumn('point');
            $table->dropColumn('repair');
        });
    }
};
