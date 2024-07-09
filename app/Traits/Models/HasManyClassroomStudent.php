<?php

namespace App\Traits\Model;

use App\Models\ClassroomStudent;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyClassroomStudent {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classroomStudents(): HasMany
    {
        return $this->hasMany(ClassroomStudent::class);
    }

}
