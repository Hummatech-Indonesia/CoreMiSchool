<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

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
        'description',
        'active',
        'type',
        'level'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function maples(): HasMany
    {
        return $this->hasMany(Maple::class);
    }

    public function schoolYears(): HasMany
    {
        return $this->hasMany(SchoolYear::class);
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function lessonHours(): HasMany
    {
        return $this->hasMany(LessonHour::class);
    }
}
