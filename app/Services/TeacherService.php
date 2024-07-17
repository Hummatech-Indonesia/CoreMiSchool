<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherService
{
    use UploadTrait;

    private UserInterface $user;

    public function __construct(UserInterface $user) {
        $this->user = $user;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreEmployeeRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nik']),
        ];
        $user = $this->user->store($dataUser);
        $user->assignRole(RoleEnum::TEACHER->value);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(UploadDiskEnum::TEACHER->value, 'public');
        }

        $data['status'] = RoleEnum::TEACHER->value;
        $data['user_id'] = $user->id;
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(Employee $employee, UpdateEmployeeRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nik']),
        ];
        $this->user->update($employee->user_id, $dataUser);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($employee->image == null) {
                $data['image'] = $request->file('image')->store(UploadDiskEnum::TEACHER->value, 'public');
            } else {
                $this->remove($employee->image);
                $data['image'] = $request->file('image')->store(UploadDiskEnum::TEACHER->value, 'public');
            }
        } else {
            $data['image'] = $employee->image;
        }

        return $data;
    }

    public function delete(Employee $employee)
    {
        if ($employee->image != null) {
            $this->remove($employee->image);
        }
    }
}
