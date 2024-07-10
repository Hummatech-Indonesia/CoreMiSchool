<?php

namespace App\Traits\Models;

use App\Models\Maple;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyMaple {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maples(): HasMany
    {
        return $this->hasMany(Maple::class);
    }

}
