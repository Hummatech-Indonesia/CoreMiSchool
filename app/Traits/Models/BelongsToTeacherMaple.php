<?php

namespace App\Traits\Model;

use App\Models\TeacherMaple;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToTeacherMaple {

    /**
     * Get the school that owns the BelongsToSchool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacherMaple(): BelongsTo
    {
        return $this->belongsTo(TeacherMaple::class);
    }

}
