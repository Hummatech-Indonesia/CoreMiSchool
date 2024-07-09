<?php

namespace App\Models;

use App\Traits\Model\BelongsToSchool;
use App\Traits\Model\HasManyLessonSchedule;
use App\Traits\Model\HasManyTeacherMaple;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory, BelongsToSchool, HasManyTeacherMaple, HasManyLessonSchedule;

    protected $fillable = [
        'school_year',
        'school_id',
    ];
}
