<?php

namespace App\Models;

use App\Traits\Model\HasReligion;
use App\Traits\Model\HasSchool;
use App\Traits\Model\HasUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUser, HasSchool, HasReligion;

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
