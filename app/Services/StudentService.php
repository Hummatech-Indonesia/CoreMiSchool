<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
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

    public function __construct(UserInterface $user) {
        $this->user = $user;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreStudentRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nisn']),
        ];
        $user = $this->user->store($dataUser);

        $data['user_id'] = $user->id;
        $data['school_id'] = auth()->user()->school->id;
        
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
        $this->user->update($student->user_id, $dataUser);
        return $data;
    }

    public function delete(Student $student)
    {
        //
    }
}