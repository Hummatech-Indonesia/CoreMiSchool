<?php

namespace App\Services;

use App\Contracts\Interfaces\RfidInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeService
{
    use UploadTrait;

    private RfidInterface $rfid;

    public function __construct(RfidInterface $rfid) {
        $this->rfid = $rfid;
    }

    public function store(StoreModelHasRfidRequest $request): array|bool
    {
        $data = $request->validated();
        $this->rfid->

        return $data;
    }
}
