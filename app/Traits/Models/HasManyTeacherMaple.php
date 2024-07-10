<?php

namespace App\Traits\Models;

use App\Models\TeacherMaple;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyTeacherMaple {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacherMaples(): HasMany
    {
        return $this->hasMany(TeacherMaple::class);
    }

}
