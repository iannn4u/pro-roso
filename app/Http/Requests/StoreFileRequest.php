<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'judul_file.required' => 'Judul file harus diisi',
            'judul_file.unique' => 'Judul ini sudah digunakan',
            'files.required' => 'Files harus diisi',
            'files.file' => 'Files format harus file',
            'status.required' => 'Status file harus diisi',
            'deskripsi.required' => 'Deskripsi file harus diisi'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
