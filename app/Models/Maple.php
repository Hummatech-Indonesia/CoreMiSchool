<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\HasManyTeacherMaple;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maple extends Model
{
    use HasFactory, BelongsToSchool, HasManyTeacherMaple;

    protected $fillable = [
        'school_id',
        'name',
    ];
}
