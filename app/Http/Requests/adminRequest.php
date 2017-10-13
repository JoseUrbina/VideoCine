<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminRequest extends FormRequest
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
            'cedula' => 'required',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required|max:100',
            'phoneNumber' => 'required|max:8',
            'gender' => 'required',
            'username' => 'required|unique:users|max:80',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|max:150'
        ];
    }
}
