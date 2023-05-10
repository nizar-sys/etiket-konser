<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateOrder extends FormRequest
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
            'nama_pemesan' => 'required',
            'email_pemesan' => 'required|email',
            'no_hp_pemesan' => 'required|numeric|digits_between:10,13',
            'jumlah_tiket' => 'required|numeric|min:1',
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
            'nama_pemesan.required' => 'Nama pemesan tidak boleh kosong',
            'email_pemesan.required' => 'Email pemesan tidak boleh kosong',
            'email_pemesan.email' => 'Email pemesan tidak valid',
            'no_hp_pemesan.required' => 'No HP pemesan tidak boleh kosong',
            'no_hp_pemesan.numeric' => 'No HP pemesan harus berupa angka',
            'no_hp_pemesan.digits_between' => 'No HP pemesan harus berisi 10-13 angka',
            'jumlah_tiket.required' => 'Jumlah tiket tidak boleh kosong',
            'jumlah_tiket.numeric' => 'Jumlah tiket harus berupa angka',
            'jumlah_tiket.min' => 'Jumlah tiket minimal 1',
        ];
    }
}
