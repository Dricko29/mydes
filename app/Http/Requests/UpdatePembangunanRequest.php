<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembangunanRequest extends FormRequest
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
            'volume' => ['required', 'max:255'],
            'sifat' => ['required'],
            'anggaran' => ['required', 'numeric'],
            'sumber_dana_id' => ['required'],
            'tahun_anggaran' => ['required', 'numeric'],
            'sb_pemerintah' => ['nullable', 'numeric'],
            'sb_provinsi' => ['nullable', 'numeric'],
            'sb_kab_kot' => ['nullable', 'numeric'],
            'sb_swadaya' => ['nullable', 'numeric'],
            'sifat' => ['required'],
            'pelaksana' => ['nullable', 'max:255'],
            'lokasi' => ['required', 'max:255'],
            'manfaat' => ['nullable'],
            'keterangan' => ['nullable'],
        ];
    }
}