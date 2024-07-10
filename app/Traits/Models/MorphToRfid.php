<?php

namespace App\Traits\Models;

trait MorphToRfid {

    public function model()
    {
        return $this->morphTo();
    }

}
