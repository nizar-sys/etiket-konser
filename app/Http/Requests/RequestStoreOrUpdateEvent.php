<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateEvent extends FormRequest
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
            'nama_acara' => 'required|string|max:255',
            'harga_tiket' => 'required|integer',
            'tanggal_acara' => 'required|date',
            'deskripsi_acara' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nama_acara.required' => 'Nama acara harus diisi',
            'nama_acara.string' => 'Nama acara harus berupa string',
            'nama_acara.max' => 'Nama acara maksimal 255 karakter',
            'harga_tiket.required' => 'Harga tiket harus diisi',
            'harga_tiket.integer' => 'Harga tiket harus berupa angka',
            'tanggal_acara.required' => 'Tanggal acara harus diisi',
            'tanggal_acara.date' => 'Tanggal acara harus berupa tanggal',
            'deskripsi_acara.required' => 'Deskripsi acara harus diisi',
            'deskripsi_acara.string' => 'Deskripsi acara harus berupa string',
            'lokasi.required' => 'Lokasi acara harus diisi',
            'lokasi.string' => 'Lokasi acara harus berupa string',
            'lokasi.max' => 'Lokasi acara maksimal 255 karakter',
            'poster.required' => 'Poster acara harus diisi',
            'poster.image' => 'Poster acara harus berupa gambar',
            'poster.mimes' => 'Poster acara harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            'poster.max' => 'Poster acara maksimal 2048 kilobytes',
        ];
    }
}
