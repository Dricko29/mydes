<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDokumentasiPembangunanRequest extends FormRequest
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
            'pembangunan_id' => ['required'],
            'tanggal' => ['nullable', 'date'],
            'keterangan' => ['nullable'],
            'gambar' => ['nullable', 'mimes:png,jpg'],
            'progres' => ['required', 'numeric']
        ];
    }
}