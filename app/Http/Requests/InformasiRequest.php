<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformasiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // akses sudah dibatasi middleware "auth" pada route
    }

    public function rules(): array
    {
        return [
            'nama'            => ['required', 'string', 'max:500'],
            'jenis_informasi' => ['nullable', 'string', 'max:100'],
            'tahun'           => ['required', 'regex:/^\d{4}(\s*[\/-]\s*\d{4})?$/'],
            'pj'              => ['nullable', 'string', 'max:150'],
            'dokumen'         => ['nullable', 'file', 'mimes:pdf', 'max:5120'],
            'tampil'          => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required'    => 'Nama dokumen harus diisi.',
            'nama.max'         => 'Nama dokumen maksimal 500 karakter.',
            'tahun.required'   => 'Tahun harus diisi.',
            'tahun.regex'      => 'Format tahun tidak valid. Contoh: 2025 atau 2024/2025.',
            'jenis_informasi.max' => 'Jenis maksimal 100 karakter.',
            'pj.max'           => 'Penanggung jawab maksimal 150 karakter.',
                        'dokumen.file'     => 'Berkas dokumen tidak valid.',
            'dokumen.mimes'    => 'Dokumen harus berformat PDF.',
            'dokumen.max'      => 'Ukuran dokumen maksimal 5 MB.',
        ];
    }
}