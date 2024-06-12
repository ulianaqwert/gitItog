<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'count' => 'required|regex:/\d/',
            'price' => 'required|regex:/\d/',
            'structure' => 'required',
            'top' => 'required',
            'medium' => 'required',
            'base' => 'required',
            'text' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязателено к заполнению',
            'regex:/\d/' => 'Для поля допустимы только цифры'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'count' => 'Кол-во',
            'price' => 'Цена',
            'text' => 'Описание',
            'structure' => 'Состав',
            'top' => 'Верхние ноты',
            'medium' => 'Средние ноты',
            'base' => 'Базовые ноты',
        ];
    }
}
