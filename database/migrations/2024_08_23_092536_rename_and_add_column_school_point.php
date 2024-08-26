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
            $table->dropColumn('max_points');
            $table->integer('start_point')->default(10)->after('id');
            $table->integer('end_point')->default(10)->after('start_point');
            $table->longText('description')->nullable()->after('end_point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_points', function (Blueprint $table) {
            $table->integer('max_points')->default(10);
            $table->dropColumn('start_point');
            $table->dropColumn('end_point');
            $table->dropColumn('description');
        });
    }
};
