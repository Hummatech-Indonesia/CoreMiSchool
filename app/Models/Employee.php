<?php

namespace App\Models;

use App\Traits\Model\BelongsToReligion;
use App\Traits\Model\BelongsToSchool;
use App\Traits\Model\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, BelongsToUser, BelongsToSchool, BelongsToReligion;

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
