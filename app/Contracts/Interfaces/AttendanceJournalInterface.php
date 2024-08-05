<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\ShowInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;
use App\Contracts\Interfaces\Eloquent\WhereInterface;

interface AttendanceJournalInterface extends GetInterface, StoreInterface, UpdateInterface, ShowInterface, DeleteInterface, WhereInterface
{
    public function deleteByJournalTeacher(mixed $id) : mixed;
    public function whereLessonSchedule(mixed $id) : mixed;
}
