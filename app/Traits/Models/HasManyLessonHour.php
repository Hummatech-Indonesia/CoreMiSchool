<?php

namespace App\Traits\Model;

use App\Models\LessonHour;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyLessonHour {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessonHours(): HasMany
    {
        return $this->hasMany(LessonHour::class);
    }

}
