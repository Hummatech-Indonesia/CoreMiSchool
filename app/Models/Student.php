<?php

namespace App\Models;

use App\Traits\Models\BelongsToReligion;
use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroomStudent;
use App\Traits\Models\HasManyExtracurricularStudent;
use App\Traits\Models\MorphManyRfid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, BelongsToUser, BelongsToSchool, BelongsToReligion, HasManyClassroomStudent, HasManyExtracurricularStudent, MorphManyRfid;

    protected $fillable = [
        'user_id',
        'image',
        'nisn',
        'nik',
        'religion_id',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'number_kk',
        'number_akta',
        'order_child',
        'count_siblings',
        'school_id'
    ];
}
