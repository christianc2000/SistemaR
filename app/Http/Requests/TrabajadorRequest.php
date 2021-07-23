<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadorRequest extends FormRequest
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
            'ci'=>'required|max:10',
            'nombre'=>'required|max:20',
            'apellido'=>'required|max:40',
            'sexo'=>'required|max:20',
            'codCargo'=>'required|numeric',
            'estado'=>'required|boolean'
        ];
    }
    public function messages()
    {
        return[
        'sexo.required'=>'debe ingresar el sexo del trabajador',
        'codCargo.required'=> 'debe ingresar el cargo que ocupara el trabajador',
        'codCargo.numeric'=> 'debe seleccionar el cargo que ocupara el trabajador',
        'estado.required'=> 'debe seleccionar el estado del trabajador',
        // 'estado.boolean'=> 'debe seleccionar el estado del trabajador'
        ];
    }
}
