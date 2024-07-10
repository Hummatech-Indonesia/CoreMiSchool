<?php

namespace App\Traits\Model;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyEmployee {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

}
