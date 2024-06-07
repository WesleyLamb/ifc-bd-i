<?php

namespace App\Http\Requests;

use App\Models\Cargo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFuncionarioRequest extends FormRequest
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
            'nome' => ['required', 'string'],
            'cpf' => ['required', 'numeric'],
            'dataNascimento' => ['required', 'date'],
            'dataAdmissao' => ['required', 'date'],
            'cargoId' => ['required', Rule::exists(Cargo::class, 'uuid')],
            'salarioBase' => ['required', 'numeric']
        ];
    }
}
