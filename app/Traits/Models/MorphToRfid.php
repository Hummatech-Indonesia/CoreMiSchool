<?php

namespace App\Traits\Models;

trait MorphTo {

    public function model()
    {
        return $this->morphTo();
    }

}
