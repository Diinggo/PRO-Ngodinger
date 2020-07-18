<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class userrequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'usernama' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ];
    }
    public function messages() {
        return [
            'name' => 'Username Sudah Ada !',
            'usernama' => 'Nama Belum Ada !',
            'email' => 'Email Harus Ada',
        ];
    }
}
