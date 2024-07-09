<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolRequest extends FormRequest
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
            'npsn' => 'required|min:8',
            'phone_number' => 'required|min:15',
            'image' => 'required',
            'pas_code' => 'required|min:10',
            'address' => 'required',
            'head_school' => 'required',
            'nip' => 'required',
            'website_school' => 'nullable',
            'description' => 'nullable',
            'province' => 'required',
            'city' => 'required',
            'sub_district' => 'required',
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
            'npsn.required' => 'NPSN wajib diisi.',
            'npsn.min' => 'NPSN harus terdiri dari minimal 8 karakter.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.min' => 'Nomor telepon harus terdiri dari minimal 15 karakter.',
            'image.required' => 'Gambar wajib diunggah.',
            'pas_code.required' => 'Kode PAS wajib diisi.',
            'pas_code.min' => 'Kode PAS harus terdiri dari minimal 10 karakter.',
            'address.required' => 'Alamat wajib diisi.',
            'head_school.required' => 'Nama kepala sekolah wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'province.required' => 'Profinsi wajib di isi',
            'city.required' => 'Kabupaten atau kota wajib di isi',
            'sub_district.required' => 'Kecamatan wajib di isi'
        ];
    }
}
