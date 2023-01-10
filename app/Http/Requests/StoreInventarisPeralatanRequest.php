<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventarisPeralatanRequest extends FormRequest
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
            'kategori_peralatan_id' => ['required'],
            'nama' => ['nullable'],
            'kode' => ['nullable', 'unique:inventaris_peralatans'],
            'no_register' => ['nullable', 'unique:inventaris_peralatans'],
            'merk' => ['nullable', 'max:255'],
            'ukuran' => ['nullable', 'max:255'],
            'bahan' => ['nullable', 'max:255'],
            'no_pabrik' => ['nullable', 'max:255'],
            'no_rangka' => ['nullable', 'max:255'],
            'no_mesin' => ['nullable', 'max:255'],
            'no_polisi' => ['nullable', 'max:255'],
            'bpkb' => ['nullable', 'max:255'],
            'tahun' => ['required', 'numeric'],
            'pengguna_barang_id' => ['required'],
            'asal_id' => ['required'],
            'harga' => ['required', 'numeric'],
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