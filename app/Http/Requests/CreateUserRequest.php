<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      =>  'required',
            'last_name' =>  'required',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required',
            'role_id'    =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  'El nombre es requerido',
            'last_name.required' =>  'El apellido es requerido',
            'email.required' =>  'El correo es requerido',
            'email.unique'  =>  'Este correo ya esta guardado',
            'password.required' =>  'La contraseña es requerida',
            'role_id.required' =>  'La rol es requerido',
        ];
    }
}
