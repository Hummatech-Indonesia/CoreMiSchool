<?php

namespace App\Models;

use App\Traits\Model\BelongsToCity;
use App\Traits\Model\BelongsToProvince;
use App\Traits\Model\BelongsToUser;
use App\Traits\Model\HasManyClassroom;
use App\Traits\Model\HasManyEmplopyee;
use App\Traits\Model\HasManyLessonHour;
use App\Traits\Model\HasManyMaple;
use App\Traits\Model\HasManySchoolYear;
use App\Traits\Model\HasManyStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    use HasFactory, BelongsToCity,
    BelongsToUser, BelongsToProvince,
    HasManyStudent, HasManyEmplopyee,
    HasManyMaple, HasManySchoolYear,
    HasManyClassroom, HasManyLessonHour;

    protected $fillable = [
        'npsn',
        'phone_number',
        'image',
        'user_id',
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

    /**
     * Get the user that owns the School
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
