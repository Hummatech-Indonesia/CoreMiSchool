<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowWithSlugInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;
use App\Contracts\Interfaces\Eloquent\WhereUserIdInterface;

interface SchoolInterface extends GetInterface, StoreInterface, UpdateInterface, ShowWithSlugInterface, DeleteInterface, PaginateInterface, WhereInterface, WhereUserIdInterface
{
    //
}
