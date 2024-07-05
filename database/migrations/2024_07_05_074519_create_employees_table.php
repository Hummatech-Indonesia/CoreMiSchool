<?php

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
            $table->string('name');
            $table->bigInteger('nip');
            $table->date('birthdate');
            $table->date('birthplace');
            $table->bigInteger('nik');
            $table->string('phone_number');
            $table->longText('address');
            $this->addForeignId($table, 'religion_id');
            $this->addForeignId($table, 'user_id');
            $this->addGender($table);
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
