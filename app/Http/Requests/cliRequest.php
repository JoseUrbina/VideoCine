<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cliRequest extends FormRequest
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
        $rules = array('name' => 'required|max:255',
                       'lastname' => 'required|max:255',
                       'address' => 'required|max:100',
                       'phoneNumber' => 'required|max:8',
                       'gender' => 'required');

        // Validating if method is PUT (UPDATE)  add the rules
        if($this->method() == 'POST')
        {
          $rules['username'] = 'required|unique:users|max:80';
          $rules['email'] = 'required|unique:users|max:100';
          $rules['password'] = 'required|max:150';
        }

        return $rules;
    }
}
