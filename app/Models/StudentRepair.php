<?php

namespace App\Models;

use App\Traits\Models\BelongsToClassroomStudent;
use App\Traits\Models\BelongsToRepair;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRepair extends Model
{
    use HasFactory, BelongsToClassroomStudent, BelongsToRepair;

    protected $fillable = [
        'classroom_student_id',
        'repair_id',
        'is_approved',
    ];
}