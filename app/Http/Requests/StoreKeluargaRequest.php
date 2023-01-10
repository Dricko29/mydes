<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeluargaRequest extends FormRequest
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
            'no_keluarga' => ['required', 'unique:keluargas', 'numeric'],
            'tanggal_terdaftar' => ['nullable','date'],
            'alamat' => ['nullable', 'max:255'],
            'tanggal_cetak' => ['nullable', 'date']
        ];
    }
}