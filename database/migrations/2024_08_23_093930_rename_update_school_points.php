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
        Schema::table('school_points', function (Blueprint $table) {
            $table->renameColumn('max_points', 'start_point');
            $table->integer('end_point')->default(10)->after('max_points');
            $table->longText('description')->nullable()->after('end_point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_points', function (Blueprint $table) {
            $table->renameColumn('start_point', 'max_points');
            $table->dropColumn('end_point');
            $table->dropColumn('description');
        });
    }
};
