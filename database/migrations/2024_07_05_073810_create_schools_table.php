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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->char('npsn', 8);
            $table->char('phone_number', 15);
            $table->text('image');
            $this->addForeignId($table, 'province_id');
            $this->addForeignId($table, 'city_id');
            $this->addForeignId($table, 'subdistrict_id');
            $table->char('pas_code');
            $table->longText('address');
            $table->string('head_school');
            $table->char('nip', 18);
            $table->string('website_school')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
