<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\HasManyExtracurricularStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToSchool, HasManyExtracurricularStudent;

    protected $fillable = [
        'name',
        'employee_id',
        'school_id',
    ];
}
