<?php

namespace App\Services;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\RfidInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreModelHasRfidRequest;
use App\Http\Requests\UpdateModelHasRfidRequest;
use App\Models\Employee;
use App\Models\ModelHasRfid;
use App\Models\Student;

class ModelHasRfidService
{
    private RfidInterface $rfid;
    private ModelHasRfidInterface $modelRfid;

    public function __construct(RfidInterface $rfid, ModelHasRfidInterface $modelRfid)
    {
        $this->rfid = $rfid;
        $this->modelRfid = $modelRfid;
    }

    public function check(StoreModelHasRfidRequest $request): array|bool
    {
        $data = $request->validated();
        return $this->rfid->where($data['rfid']);
    }

    public function update(UpdateModelHasRfidRequest $request, string $role, string $id): mixed
    {
        $data = $request->validated();

        // update old rfid
        $this->modelRfid->update($request->old_rfid, ['model_type' => null, 'model_id' => null]);

        $rfid = $this->modelRfid->where($data['rfid']);
        if ($rfid->model_type == null) {
            if ($role == RoleEnum::STUDENT->value) {
                $this->modelRfid->update($data['rfid'], ['model_type' => 'App\Models\Student', 'model_id' => $id]);
            } else if ($role == RoleEnum::TEACHER->value) {
                $this->modelRfid->update($data['rfid'], ['model_type' => 'App\Models\Employee', 'model_id' => $id]);
            } else {
                $this->modelRfid->update($data['rfid'], ['model_type' => 'App\Models\Employee', 'model_id' => $id]);
            }

            return redirect()->back()->with('success', 'Berhasil menambahkan rfid');
        } else {
            return redirect()->back()->with('error', 'RFID telah digunakan');
        }

    }
}
