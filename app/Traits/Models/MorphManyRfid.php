<?php

namespace App\Traits\Models;

use App\Models\ModelHasRfid;

trait MorphManyRfid {

    public function modelHasRfid()
    {
        return $this->morphMany(ModelHasRfid::class, 'model');
    }

}
