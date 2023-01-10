<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKeluargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'no_keluarga' => ['required', 'digits:16', 'numeric', Rule::unique('keluargas')->ignore($this->keluarga)],
            'alamat' => ['required', 'max:255', 'string'],
            'tanggal_terdaftar' => ['required', 'date'],
            'tanggal_cetak' => ['nullable', 'date']
        ];
    }
}