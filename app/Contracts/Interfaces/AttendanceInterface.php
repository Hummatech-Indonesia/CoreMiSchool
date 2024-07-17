<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\PaginateInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereSchoolInterface;

interface AttendanceInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, PaginateInterface, WhereSchoolInterface
{
    public function AttendanceChart(mixed $id, mixed $year, mixed $month, mixed $status) : mixed;
    public function getSchool(mixed $id, mixed $query): mixed;
    public function checkPresence(mixed $id, mixed $status) : mixed;
    public function updateCheckOut(mixed $id, array $data) : mixed;
}
