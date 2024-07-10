<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

  /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'classroom_id' => 'required',
            'lesson_hour_start' => 'required',
            'lesson_hour_end' => 'required',
            'teacher_maple_id' => 'required',
            'school_year_id' => 'required',
            'day' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'classroom_id.required' => 'ID Kelas wajib diisi.',
            'lesson_hour_start.required' => 'Jam mulai pelajaran wajib diisi.',
            'lesson_hour_end.required' => 'Jam selesai pelajaran wajib diisi.',
            'teacher_maple_id.required' => 'ID Guru Maple wajib diisi.',
            'school_year_id.required' => 'ID Tahun Ajaran wajib diisi.',
            'day.required' => 'Hari wajib diisi.',
        ];
    }
}
