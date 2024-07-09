<?php

namespace App\Traits\Model;

use App\Models\Province;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasProvince {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
