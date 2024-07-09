<?php

namespace App\Models;

use App\Traits\Model\BelongsToLessonHour;
use App\Traits\Model\BelongsToSchoolYear;
use App\Traits\Model\BelongsToTeacherMaple;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonSchedule extends Model
{
    use HasFactory, BelongsToLessonHour, BelongsToSchoolYear, BelongsToTeacherMaple;

    protected $guarded = ['id'];

    protected $fillable = [
        'classroom_id',
        'lesson_hour_start',
        'lesson_hour_end',
        'teacher_maple_id',
        'school_year_id',
        'day'
    ];
}
