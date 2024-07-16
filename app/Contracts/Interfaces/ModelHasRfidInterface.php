<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface ModelHasRfidInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface, WhereInterface
{
    public function exists(mixed $rfid): mixed;

    public function activeRfid(): mixed;
    public function masterRfid(): mixed;
    public function nonActiveRfid(): mixed;
    public function whereSchool($id): mixed;
    public function whereNotNull(mixed $column):mixed;
    public function whereNull(mixed $column):mixed;

    public function whereRfid(mixed $query) : mixed;
}
