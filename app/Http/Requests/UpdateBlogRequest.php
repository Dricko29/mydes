<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
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
            'judul' => ['required', 'string', 'max:255'],
            'slug' => ['required', Rule::unique('blogs')->ignore($this->blog)],
            'category_id' => ['required'],
            'isi' => ['required'],
            'gambar' => ['nullable', 'mimes:png,jpg,jpeg', 'max:5000'],
            'status' => ['required', 'between:1,3'],
        ];
    }
}