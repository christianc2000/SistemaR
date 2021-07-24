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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'rol'=>'required'
            // 'ci_trab'=>'required|max:10',
        ];
        
    }
    public function messages()
    {
        return[
        'name.required'=>'ingrese el nombre de usuario',
        'email.required'=> 'debe ingresar un email',
        'password.numeric'=> 'debe ingresar una contraseña',
        'rol.required'=> 'debe seleccionar un rol',
        // 'ci_trab.required'=> 'debe seleccionar el estado del trabajador',
        ];
    }
}
