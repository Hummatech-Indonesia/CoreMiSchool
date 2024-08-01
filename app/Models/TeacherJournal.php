<?php

namespace App\Models;

use App\Traits\Models\BelongsToLessonSchedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherJournal extends Model
{
    use HasFactory, BelongsToLessonSchedule;

    protected $guarded = ['id'];
}
