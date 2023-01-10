<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendudukRequest extends FormRequest
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
            'no_keluarga' => ['required', 'numeric', 'digits:16', 'unique:keluargas'],
            'nama' => ['required', 'max:255'],
            'nik' => ['required', 'numeric', 'digits:16', 'unique:penduduks'],
            'keluarga_id' => ['nullable'],
            'no_keluarga_sebelumnya' => ['nullable', 'numeric', 'digits:16'],
            'tempat_lahir' => ['required', 'max:100'],
            'tanggal_lahir' => ['required', 'date'],
            'attr_kelamin_id' => ['required'],
            'attr_pendidikan_id' => ['nullable'],
            'attr_pendidikan_keluarga_id' => ['required'],
            'attr_status_id' => ['required'],
            'attr_status_dasar_id' => ['nullable'],
            'attr_agama_id' => ['required'],
            'attr_pekerjaan_id' => ['required'],
            'attr_hubungan_id' => ['required'],
            'attr_hubungan_keluarga_id' => ['nullable'],
            'attr_status_kawin_id' => ['required'],
            'attr_suku_id' => ['required'],
            'attr_golongan_darah_id' => ['required'],
            'attr_warganegara_id' => ['required'],
            'attr_bahasa_id' => ['required'],
            'alamat' => ['nullable', 'max:255'],
            'dusun_id' => ['required'],
            'rukun_warga_id' => ['required'],
            'rukun_tetangga_id' => ['required'], 
            'nama_ayah' => ['nullable','max:255'],
            'nik_ayah' => ['nullable', 'numeric'],
            'nama_ibu' => ['nullable', 'max:255'],
            'nik_ibu' => ['nullable', 'numeric'],
            'ket' => ['nullable'],
            'paspor' => ['nullable'],
            'kitas' => ['nullable'],
            'foto' => ['nullable', 'mimes:png,jpg'],
            'tlp' => ['nullable'],
            'email' => ['nullable', 'email'],
            'tanggal_paspor' => ['nullable', 'date'],
            'tanggal_lapor' => ['nullable', 'date'],
            'tanggal_masuk' => ['nullable', 'date'],
            'tanggal_perceraian' => ['nullable', 'date'],
            'tanggal_pernikahan' => ['nullable', 'date'],
            'no_akta_pernikahan' => ['nullable', 'max:100'],
            'no_akta_perceraian' => ['nullable', 'max:100'],
            'no_bpjs' => ['nullable'],
            'no_akta_kelahiran' => ['nullable'],
            'waktu_kelahiran' => ['nullable'],
            'berat_kelahiran' => ['nullable'],
            'panjang_kelahiran' => ['nullable'],
            'penolong_kelahiran' => ['nullable'],
            'tempat_dilahirkan' => ['nullable'],
            'jenis_kelahiran' => ['nullable'],
            'anak_ke' => ['nullable'],
        ];
    }
}