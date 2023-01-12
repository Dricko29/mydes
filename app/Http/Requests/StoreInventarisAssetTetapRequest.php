<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInventarisAssetTetapRequest extends FormRequest
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
            'kategori_asset_id' => ['required'],
            'nama' => ['nullable'],
            'kode' => ['nullable', 'unique:inventaris_asset_tetaps'],
            'no_register' => ['nullable', 'unique:inventaris_asset_tetaps'],
            'jenis_asset_id' => ['required'],
            'asal_id' => ['required'],
            'tahun' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'harga' => ['required', 'numeric'],
            'keterangan' => ['nullable'],
            'judul_buku' => ['nullable','string', 'max:255', 'required_if:jenis_asset_id,1'],
            'spesifikasi_buku' => ['nullable','required_if:jenis_asset_id,1', 'string', 'max:255'],
            'asal_daerah' => ['nullable', 'required_if:jenis_asset_id,2', 'string', 'max:255'],
            'pencipta' => ['nullable', 'string', 'max:255'],
            'jenis_hewan' => ['nullable', 'required_if:jenis_asset_id,3', 'string', 'max:255'],
            'ukuran_hewan' => ['nullable', 'string', 'max:255'],
            'jenis_tumbuhan' => ['nullable', 'required_if:jenis_asset_id,4', 'string', 'max:255'],
            'ukuran_tumbuhan' => ['nullable', 'string', 'max:255'],
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