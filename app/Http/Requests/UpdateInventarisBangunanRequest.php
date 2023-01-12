<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarisBangunanRequest extends FormRequest
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
            'kategori_bangunan_id' => ['required'],
            'nama' => ['nullable'],
            'kode' => ['nullable', Rule::unique('inventaris_bangunans')->ignore($this->inventarisBangunan)],
            'no_register' => ['nullable', Rule::unique('inventaris_bangunans')->ignore($this->inventarisBangunan)],
            'kondisi_bangunan_id' => ['required'],
            'bertingkat' => ['required'],
            'luas_bangunan' => ['required', 'numeric'],
            'luas_tanah' => ['required', 'numeric'],
            'kode_tanah' => ['required'],
            'tahun' => ['required'],
            'no_bangunan' => ['nullable'],
            'tanggal_dokumen_bangunan' => ['nullable'],
            'status_tanah_id' => ['required'],
            'pengguna_barang_id' => ['required'],
            'asal_id' => ['required'],
            'beton' => ['boolean'],
            'harga' => ['numeric'],
            'lokasi' => ['nullable'],
            'keterangan' => ['nullable'],
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