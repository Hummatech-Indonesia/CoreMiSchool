<?php

namespace App\Models;

use App\Traits\Model\BelongsToReligion;
use App\Traits\Model\BelongsToSchool;
use App\Traits\Model\BelongsToUser;
use App\Traits\Model\HasManyClassroomStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, BelongsToUser, BelongsToSchool, BelongsToReligion, HasManyClassroomStudent;

    protected $fillable = [
        'user_id',
        'nisn',
        'religion_id',
        'gender',
        'birth_date',
        'birth_place',
        'number_kk',
        'number_akta',
        'order_child',
        'count_siblings',
        'school_id'
    ];
}
