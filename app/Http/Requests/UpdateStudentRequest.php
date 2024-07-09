<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nisn' => 'required|numeric',
            'religion_id' => 'required|exists:religions,id',
            'birth_date' => 'required|date',
            'birth_place' => 'required',
            'number_kk' => 'required|numeric',
            'number_akta' => 'required|numeric',
            'order_child' => 'required|numeric',
            'count_siblings' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.numeric' => 'NISN harus berupa angka',
            'religion_id.required' => 'Agama tidak boleh kosong',
            'religion_id.exists' => 'Agama tidak ditemukan',
            'birth_date.required' => 'Tanggal lahir tidak boleh kosong',
            'birth_date.date' => 'Tanggal lahir harus berupa tanggal',
            'birth_place.required' => 'Tempat lahir tidak boleh kosong',
            'number_kk.required' => 'Nomor KK tidak boleh kosong',
            'number_kk.numeric' => 'Nomor KK harus berupa angka',
            'number_akta.required' => 'Nomor akta tidak boleh kosong',
            'number_akta.numeric' => 'Nomor akta harus berupa angka',
            'order_child.required' => 'Anak ke- tidak boleh kosong',
            'order_child.numeric' => 'Anak ke- harus berupa angka',
            'count_siblings.numeric' => 'Jumlah saudaa harus berupa angka',
        ];  
    }
}
