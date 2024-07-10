<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\HasManyLessonSchedule;
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
