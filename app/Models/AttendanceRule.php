<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRule extends Model
{
    use HasFactory, BelongsToSchool;

    protected $guarded = ['id'];

    protected $fillable = [
        'school_id',
        'day',
        'role',
        'checkin_start',
        'checkin_end',
        'checkout_start',
        'checkout_end',
        'is_holiday'
    ];
}

