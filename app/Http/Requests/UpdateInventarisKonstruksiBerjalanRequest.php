<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarisKonstruksiBerjalanRequest extends FormRequest
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
            'nama' => ['required', 'max:255'],
            'fisik_bangunan_id' => ['required'],
            'bertingkat' => ['required'],
            'luas_bangunan' => ['required', 'numeric'],
            'luas_tanah' => ['required', 'numeric'],
            'kode_tanah' => ['required'],
            'no_bangunan' => ['nullable'],
            'tanggal_dokumen_bangunan' => ['date'],
            'tanggal_mulai' => ['date'],
            'status_tanah_id' => ['required'],
            'asal_id' => ['required'],
            'harga' => ['required', 'numeric'],
            'lokasi' => ['nullable'],
            'keterangan' => ['nullable'],
            'beton' => ['boolean']
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'harga' => str_replace(',', '', $this->harga)
        ]);
    }
}