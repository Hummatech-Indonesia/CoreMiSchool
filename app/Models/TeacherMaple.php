<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToMaple;
use App\Traits\Models\BelongsToSchoolYear;
use App\Traits\Models\HasManyLessonSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherMaple extends Model
{
    use HasFactory, BelongsToMaple, BelongsToEmployee, BelongsToSchoolYear, HasManyLessonSchedule;

    protected $guarded = ['id'];

    protected $fillable = [
        'maple_id',
        'employee_id',
        'school_year_id',
    ];
}
