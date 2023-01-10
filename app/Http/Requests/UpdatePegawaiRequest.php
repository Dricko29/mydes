<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePegawaiRequest extends FormRequest
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
            'nik' => ['required', 'numeric', 'digits:16', Rule::unique('pegawais')->ignore($this->pegawai)],
            'nip' => ['nullable', 'max:25', Rule::unique('pegawais')->ignore($this->pegawai)],
            'nipd' => ['nullable', 'max:25', Rule::unique('pegawais')->ignore($this->pegawai)],
            'tempat_lahir' => ['required', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'attr_kelamin_id' => ['required'],
            'attr_pendidikan_keluarga_id' => ['required'],
            'attr_agama_id' => ['required'],
            'jabatan_id' => ['required'],
            'no_skp' => ['nullable', 'max:50'],
            'tanggal_skp' => ['nullable', 'date'],
            'no_skb' => ['nullable', 'max:50'],
            'tanggal_skb' => ['nullable', 'date'],
            'masa_jabatan' => ['required'],
            'foto' => ['nullable', 'mimes:png,jpg', 'max:5000']
        ];
    }
}