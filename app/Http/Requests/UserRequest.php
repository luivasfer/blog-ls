<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'      => 'min:3|max:30|required',
            'apellido'      => 'min:3|max:30|required',
            'email'     => 'min:5|max:180|email|unique:users|required',
            'password'  => 'min:6|max:10|required',
            'nivel'  => 'required'
        ];
    }
}
