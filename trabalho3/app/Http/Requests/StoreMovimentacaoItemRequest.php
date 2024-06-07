<?php

namespace App\Http\Requests;

use App\Models\Movimentacao;
use App\Models\Produto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMovimentacaoItemRequest extends FormRequest
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
            'produtoId' => ['required', Rule::exists(Produto::class, 'uuid')],
            'quantidade' => ['required', 'numeric'],
            'precoCusto' => ['sometimes', Rule::requiredIf(function() {
                return Movimentacao::where('uuid', request()->route('movimentacao_id'))->firstOrFail()->tipo_movimentacao == 'E';
            })],
            'precoVenda' => ['sometimes', Rule::requiredIf(function() {
                return Movimentacao::where('uuid', request()->route('movimentacao_id'))->firstOrFail()->tipo_movimentacao == 'S';
            })]
        ];
    }
}
