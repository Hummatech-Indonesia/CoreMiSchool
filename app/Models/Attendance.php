<?php

namespace App\Models;

use App\Traits\Model\BelongsToClassroomStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory, BelongsToClassroomStudent;

    protected $guarded = ['id'];

    protected $fillable = [
        'classroom_student_id',
        'point',
        'status',
    ];
}
