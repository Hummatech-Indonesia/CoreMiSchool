<?php

namespace App\Models;

use App\Traits\Models\BelongsToExtracurricular;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtracurricularStudent extends Model
{
    use HasFactory, BelongsToExtracurricular;

    protected $guarded = ['id'];

    protected $fillable = [
        'student_id',
        'extracurricular_id',
    ];
}
