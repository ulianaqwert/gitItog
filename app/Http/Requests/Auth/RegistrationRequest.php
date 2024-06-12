<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required|regex:/8[0-9]{10}/|unique:users,phone',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute - обязателен к заполнению',
            'unique' => 'Телефон есть в базе',
            'confirmed' => 'Пароли не совпадают',
            'regex' => 'Не верный формат телефона'
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'телефон',
            'password' => 'пароль',
            'name' => 'логин',
            'password_confirmation' => 'пароль'
        ];
    }
}
