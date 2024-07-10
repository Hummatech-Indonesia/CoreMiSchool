<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToSchoolYear;
use App\Traits\Models\HasManyClassroomStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToSchoolYear, HasManyClassroomStudent;

    protected $fillable = [
        'name',
        'employee_id',
        'school_year_id',
    ];
}
