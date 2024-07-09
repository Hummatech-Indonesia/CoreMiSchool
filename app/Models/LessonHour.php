<?php

namespace App\Models;

use App\Traits\Model\BelongsToSchool;
use App\Traits\Model\HasManyLessonSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonHour extends Model
{
    use HasFactory, BelongsToSchool, HasManyLessonSchedule;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'school_id',
        'start',
        'end'
    ];
}
