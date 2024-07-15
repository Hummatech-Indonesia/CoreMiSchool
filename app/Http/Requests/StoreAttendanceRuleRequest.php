<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRuleRequest extends FormRequest
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
            'checkin_start' => 'required',
            'checkin_end' => 'required',
            'checkout_start' => 'required',
            'checkout_end' => 'required',
            'is_holiday' => 'nullable'
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'school_id.required' => 'ID Sekolah harus diisi.',
            'day.required' => 'Hari harus diisi.',
            'role.required' => 'Role harus diisi.',
            'checkin_start.required' => 'Waktu checkin awal harus diisi.',
            'checkin_end.required' => 'Waktu checkin akhir harus diisi.',
            'checkout_start.required' => 'Waktu checkout awal harus diisi.',
            'checkout_end.required' => 'Waktu checkout akhir harus diisi.',
        ];
    }
}
