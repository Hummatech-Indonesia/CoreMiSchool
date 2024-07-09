<?php

namespace App\Models;

use App\Traits\Model\BelongsToSchool;
use App\Traits\Model\BelongsToUser;
use App\Traits\Model\HasManyClassroomStudent;
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
