<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarisTanahRequest extends FormRequest
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
            'kategori_tanah_id' => ['required'],
            'nama' => ['nullable'],
            'kode' => ['nullable', Rule::unique('inventaris_tanahs')->ignore($this->inventarisTanah)],
            'no_register' => ['nullable', Rule::unique('inventaris_tanahs')->ignore($this->inventarisTanah)],
            'luas' => ['required', 'numeric'],
            'tahun' => ['required', 'numeric'],
            'hak_tanah_id' => ['required'],
            'no_sertifikat' => ['nullable'],
            'tanggal_sertifikat' => ['nullable', 'date'],
            'penggunaan_id' => ['required'],
            'pengguna_barang_id' => ['required'],
            'asal_id' => ['required'],
            'harga' => ['required', 'numeric'],
            'alamat' => ['required', 'max:255'],
            'keterangan' => ['required'],
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