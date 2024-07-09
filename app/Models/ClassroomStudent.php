<?php

namespace App\Models;

use App\Traits\Model\BelongsToClassroom;
use App\Traits\Model\BelongsToStudent;
use App\Traits\Model\HasManyAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory, BelongsToClassroom, BelongsToStudent, HasManyAttendance;

    protected $guarded = ['id'];

    protected $fillable = [
        'student_id',
        'classroom_id',
    ];
}
