<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelClass extends Model
{
    use HasFactory, BelongsToSchool;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'school_id'
    ];

}
