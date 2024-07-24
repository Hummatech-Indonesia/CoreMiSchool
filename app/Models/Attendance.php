<?php

namespace App\Models;

use App\Traits\Models\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory, MorphTo;

    protected $guarded = ['id'];

    protected $fillable = [
        'model_type',
        'model_id',
        'point',
        'status',
        'proof',
        'checkin',
        'checkout'
    ];
}
