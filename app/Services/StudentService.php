<?php

namespace App\Services;

use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentService
{
    use UploadTrait;

    private UserInterface $user;
    private StudentInterface $student;

    public function __construct(UserInterface $user, StudentInterface $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreStudentRequest $request): array|bool
    {
        $data = $request->validated();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(UploadDiskEnum::STUDENT->value, 'public');
        }

        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nisn']),
        ];
        $user = $this->user->store($dataUser);

        $data['user_id'] = $user->id;

        $user->assignRole(RoleEnum::STUDENT->value);
        return $data;
    }

    public function update(Student $student, UpdateStudentRequest $request): array|bool
    {
        $data = $request->validated();

        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nisn']),
        ];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($student->image == null) {
                $data['image'] = $request->file('image')->store(UploadDiskEnum::STUDENT->value, 'public');
            } else {
                $this->remove($student->image);
                $data['image'] = $request->file('image')->store(UploadDiskEnum::STUDENT->value, 'public');
            }
        } else {
            $data['image'] = $student->image;
        }

        $this->user->update($student->user_id, $dataUser);
        return $data;
    }

    public function delete(Student $student)
    {
        if ($student->image != null) {
            $this->remove($student->image);
        }
    }
}
