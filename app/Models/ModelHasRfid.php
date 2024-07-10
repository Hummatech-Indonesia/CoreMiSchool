<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRfid extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'rfid',
        'model_type',
        'model_id',
    ];
}
