<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroomStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory, BelongsToUser, BelongsToSchool, HasManyClassroomStudent;

    protected $fillable = [
        'name',
        'user_id',
        'school_id',
    ];
}
