<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeJournal extends Model
{
    use HasFactory, BelongsToEmployee;

    protected $guarded = ['id'];
}
