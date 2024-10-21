<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToSubject;
use App\Traits\Models\HasManyLessonSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToSubject, HasManyLessonSchedule;

    protected $guarded = ['id'];
}
