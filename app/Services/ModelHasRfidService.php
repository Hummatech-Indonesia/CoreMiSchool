<?php

namespace App\Services;

use App\Contracts\Interfaces\RfidInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Models\Employee;
use App\Models\Student;

class ModelHasRfidService
{
    private RfidInterface $rfid;

    public function __construct(RfidInterface $rfid) {
        $this->rfid = $rfid;
    }

    public function check(StoreModelHasRfidRequest $request): array|bool
    {
        $data = $request->validated();
        return $this->rfid->where($data['rfid']);
    }

    public function update(UpdateModelHasRfidRequest $request, string $role, string $id): void
    {
        $data = $request->validated();
        if ($role == RoleEnum::STUDENT->value) {
            $student = Student::find($id);
            $student->modelHasRfid()->create(['rfid' => $data['rfid']]);
        } else if ($role == RoleEnum::TEACHER->value) {
            $teacher = Employee::find($id);
            $teacher->modelHasRfid()->create(['rfid' => $data['rfid']]);
        } else {
            $employee = Employee::find($id);
            $employee->modelHasRfid()->create(['rfid' => $data['rfid']]);
        }
    }
}
