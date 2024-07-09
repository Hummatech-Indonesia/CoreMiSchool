<?php

namespace App\Models;

use App\Traits\Model\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory, BelongsToSchool;

    protected $fillable = [
        'school_year',
        'school_id',
    ];
}
