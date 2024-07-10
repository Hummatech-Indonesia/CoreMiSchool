<?php

namespace App\Models;

use App\Traits\Models\BelongsToReligion;
use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, BelongsToUser, BelongsToSchool, BelongsToReligion, HasManyClassroom;

    protected $fillable = [
        'nip',
        'birth_date',
        'birth_place',
        'genre',
        'nik',
        'phone_number',
        'address',
        'status',
        'user_id',
        'religion_id',
        'school_id',
    ];
}
