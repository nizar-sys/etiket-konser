<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCheckinTickect extends FormRequest
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
            'kode_pemesanan' => 'required|exists:orders,kode_pemesanan'
        ];
    }

    public function messages()
    {
        return [
            'kode_pemesanan.required' => 'Kode pemesanan tidak boleh kosong.',
            'kode_pemesanan.exists' => 'Kode pemesanan tidak valid.'
        ];
    }
}
