<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereSchoolInterface;
use Illuminate\Http\Request;

interface MapleInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface
{
    public function whereSchool(mixed $id, Request $request): mixed;

}
