<?php

namespace App\Traits\Models;

use App\Models\LessonHour;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToLessonHour {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lessonHour(): BelongsTo
    {
        return $this->belongsTo(LessonHour::class);
    }
}
