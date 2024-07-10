<?php

namespace App\Models;

use App\Traits\Models\BelongsToCity;
use App\Traits\Models\BelongsToProvince;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroom;
use App\Traits\Models\HasManyEmployee;
use App\Traits\Models\HasManyLessonHour;
use App\Traits\Models\HasManyMaple;
use App\Traits\Models\HasManySchoolYear;
use App\Traits\Models\HasManyStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory, BelongsToCity,
    BelongsToUser, BelongsToProvince,
    HasManyStudent, HasManyEmployee,
    HasManyMaple, HasManySchoolYear,
    HasManyLessonHour;

    protected $fillable = [
        'npsn',
        'phone_number',
        'image',
        'user_id',
        'province_id',
        'city_id',
        'sub_district_id',
        'pas_code',
        'address',
        'head_school',
        'nip',
        'website_school',
        'description',
        'active',
        'type',
        'level',
        'accreditation',
    ];
}
