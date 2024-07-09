<?php

namespace App\Models;

use App\Traits\Model\BelongsToMaple;
use App\Traits\Model\BelongsToSchoolYear;
use App\Traits\Model\BelongsToUser;
use App\Traits\Model\HasManyLessonSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMaple extends Model
{
    use HasFactory, BelongsToMaple, BelongsToUser, BelongsToSchoolYear, HasManyLessonSchedule;

    protected $guarded = ['id'];

    protected $fillable = [
        'maple_id',
        'user_id',
        'school_year_id',
    ];
}
