<?php

namespace App\Traits\Model;

use App\Models\School;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManySchool {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

}
