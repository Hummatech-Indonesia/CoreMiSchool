<?php

namespace App\Traits\Model;

use App\Models\Maple;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToMaple {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maple(): BelongsTo
    {
        return $this->belongsTo(Maple::class);
    }
}
