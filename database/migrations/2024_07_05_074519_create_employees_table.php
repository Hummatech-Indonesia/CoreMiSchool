<?php

use App\Enums\RoleEnum;
use App\Traits\Migrations\HasForeign;
use App\Traits\Migrations\HasGender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasForeign, HasGender;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip');
            $table->date('birth_date');
            $table->date('birth_place');
            $this->addGender($table);
            $table->bigInteger('nik');
            $table->string('phone_number');
            $table->longText('address');
            $table->enum('status', [RoleEnum::ADMIN->value, RoleEnum::TEACHER->value, RoleEnum::STAFF->value]);
            $this->addForeignId($table, 'user_id');
            $this->addForeignId($table, 'religion_id');
            $this->addForeignId($table, 'school_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
