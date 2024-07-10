<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreSchoolRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SchoolService
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

    public function store(StoreSchoolRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['npsn']),
        ];
        $user = $this->user->store($dataUser);
        $user->assignRole(RoleEnum::SCHOOL->value);

        $image = $this->upload(UploadDiskEnum::LOGO->value, $request->image);
        $data['image'] = $image;
        $data['user_id'] = $user->id;
        return $data;
    }

    public function update(School $school, UpdateSchoolRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['npsn']),
        ];
        $user = $this->user->update($school->user_id ,$dataUser);
        $user->assignRole(RoleEnum::SCHOOL->value);

        $old_image = $school->image;
        $image = "";

        if ($request->hasFile('image')) {
            if (file_exists(public_path($old_image))) {
                unlink(public_path($old_image));
            }
            $image = $this->upload(UploadDiskEnum::LOGO->value, $request->image);
        }

        $data['image'] = $image ?: $old_image;
        return $data;
    }

    public function delete(Student $student)
    {
        //
    }
}
