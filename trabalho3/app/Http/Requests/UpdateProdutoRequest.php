<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'descricao' => ['sometimes', 'string'],
            'quantidade' => ['sometimes', 'numeric'],
            'unidadeMedida' => ['sometimes', 'string'],
            'precoCusto' => ['sometimes', 'numeric'],
            'precoVenda' => ['sometimes', 'numeric']
        ];
    }
}
