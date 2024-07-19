<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\MorphToRfid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRfid extends Model
{
    use HasFactory, MorphToRfid;

    protected $guarded = ['id'];
}
