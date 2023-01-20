<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLayananMandiriRequest extends FormRequest
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
            'penduduk_id' => ['required', 'unique:layanan_mandiris'],
            'no_keluarga' => ['required', 'numeric', 'digits:16'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_tlp' => ['required', 'string', 'max:12'],
        ];
    }
}