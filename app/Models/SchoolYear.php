<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\HasManyClassroom;
use App\Traits\Models\HasManyLessonSchedule;
use App\Traits\Models\HasManyTeacherMaple;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory, BelongsToSchool, HasManyTeacherMaple, HasManyLessonSchedule, HasManyClassroom;

    protected $fillable = [
        'school_year',
        'school_id',
    ];
}
