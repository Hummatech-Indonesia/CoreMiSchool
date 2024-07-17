<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToLevelClass;
use App\Traits\Models\BelongsToSchoolYear;
use App\Traits\Models\HasManyClassroomStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToLevelClass, BelongsToSchoolYear, HasManyClassroomStudent;

    protected $fillable = [
        'id',
        'name',
        'employee_id',
        'school_year_id',
        'level_class_id'
    ];

    public $incrementing = false;
    public $keyType = 'char';
}
