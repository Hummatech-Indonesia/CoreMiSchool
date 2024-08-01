<?php

namespace App\Models;

use App\Traits\Models\BelongsToClassroom;
use App\Traits\Models\BelongsToLessonHour;
use App\Traits\Models\BelongsToSchoolYear;

use App\Traits\Models\BelongsToTeacherSubject;
use App\Traits\Models\HasManyTeacherJournal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonSchedule extends Model
{
    use HasFactory, BelongsToLessonHour, BelongsToSchoolYear, BelongsToTeacherSubject, BelongsToClassroom, HasManyTeacherJournal;

    protected $guarded = ['id'];
}
