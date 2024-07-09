<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'npsn',
        'phone_number',
        'image',
        'province_id',
        'city_id',
        'subdistrict_id',
        'pas_code',
        'address',
        'head_school',
        'nip',
        'website_school',
        'description'
    ];
}
