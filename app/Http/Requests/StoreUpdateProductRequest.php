<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
            'brand' => ['required'],
            'model' => ['required'],
            'serial_number' => ['required'],
            'processor' => ['required'],
            'memory' => ['required'],
            'disk' => ['required'],
            'price' => ['required'],
            'price_string' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
        ];
    }
}
