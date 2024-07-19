<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToSubject;

    protected $guarded = ['id'];
}
