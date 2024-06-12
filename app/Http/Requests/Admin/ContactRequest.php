<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязателено к заполнению',
        ];
    }

    public function attributes()
    {
        return [
            'phone' => 'Телефон',
            'email' => 'Почта',
            'address' => 'Адрес',
        ];
    }
}
