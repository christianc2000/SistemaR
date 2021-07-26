<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
            'llevar'=>'required',
            'producto'=>'required|max:10',
            'cantidad'=>'required|numeric',
            
        ];
    }
    public function messages()
    {
        return[
        'llevar.required'=>'Seleccione el estado de la compra',
        'producto.required'=> 'debe ingresar un producto',
        'cantidad.required'=> 'debe ingresar una cantidad',
        'producto.max'=> 'debe seleccionar un producto obligatoriamente',
        // 'ci_trab.required'=> 'debe seleccionar el estado del trabajador',
        ];
    }
}
