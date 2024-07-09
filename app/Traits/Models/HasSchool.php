<?php

namespace App\Traits\Model;

use App\Models\School;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasSchool {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
