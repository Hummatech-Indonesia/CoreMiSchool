<?php

namespace App\Models;

use App\Traits\Models\BelongsToReligion;
use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroom;
use App\Traits\Models\HasManyExtracurricular;
use App\Traits\Models\HasManyTeacherMaple;
use App\Traits\Models\MorphManyRfid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, BelongsToUser,
    BelongsToSchool, BelongsToReligion,
    HasManyClassroom, HasManyTeacherMaple,
    HasManyExtracurricular, MorphManyRfid;

    protected $fillable = [
        'image',
        'nip',
        'birth_date',
        'birth_place',
        'gender',
        'nik',
        'phone_number',
        'address',
        'status',
        'active',
        'user_id',
        'religion_id',
        'school_id'
    ];
}
