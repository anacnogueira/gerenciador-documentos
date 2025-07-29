<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateDocumentRequest extends FormRequest
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
            'name' => ['required'],
            'file' => ['required', 'file', 'mimes:odt,docx,doc,pdf', 'max:20248'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo é obrigatório',
            'mimes' => 'Os tipos de arquivos suportados são: doc,docx, pdf, odt.',
            'max' => 'O tamanho do arquivo não deve exceder 2MB.',
        ];
    }

}
