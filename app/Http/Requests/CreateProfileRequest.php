<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
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
            'name'  =>  'required|unique:profiles'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  'El nombre es requerido',
            'name.unique'   =>  'Este perfil ya esta guardado',
        ];
    }
}
