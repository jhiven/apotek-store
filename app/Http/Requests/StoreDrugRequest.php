<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreDrugRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'indikasi' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'image' => File::image()->min('1kb')->max('1mb'),
        ];
    }
}
