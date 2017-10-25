<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prestamoRequest extends FormRequest
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
            'cliente_id' => 'required',
            'fechaPrestamo' => 'required',
            'fechaRegreso' => 'required',
            'pelicula_id' => 'required'
        ];
    }

    // Method to change the error messages

    public function messages()
    {
        return [
                'pelicula_id.required' => 'you haven\'t chosen any movie'
        ];
    }
}
