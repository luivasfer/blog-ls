<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'articulo'      => 'min:5|max:100|required',
            'contenido'     => 'min:10|required',
            'categoria_id'  => 'required',
            'img'           => 'mimes:jpeg,jpg,png|max:800|image_size:>=300,*|required',
        ];
    }
    public function messages()
    {
        return [
            'articulo.required' => 'El título del :attribute es obligatorio.',
            'articulo.min' => 'El título del :attribute debe tener almenos 5 caracteres',
            'price.required' => 'Añade un :attribute al producto',
            'price.min' => 'El :attribute debe ser mínimo 0',
        ];
    }

    
}
