<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermohonanSuratRequest extends FormRequest
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
            'penduduk_id' => ['required'],
            'surat_id' => ['required'],
            'ket' => ['required'],
            'tlp_aktif' => ['required', 'max:13'],
            'dokumen[]' => ['nullable', 'mimes:png,jpg,jpeg,docx,pdf', 'size:5000']
        ];
    }
}