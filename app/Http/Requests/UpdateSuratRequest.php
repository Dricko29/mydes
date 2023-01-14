<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSuratRequest extends FormRequest
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
            'klasifikasi_surat_id' => ['required', Rule::unique('surats')->ignore($this->surat)],
            'nama' => ['required', 'string', 'max:255'],
            'jenis' => ['required'],
            'link' => ['required', 'string', Rule::unique('surats')->ignore($this->surat)], 
        ];
    }
}