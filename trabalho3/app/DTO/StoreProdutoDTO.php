<?php

namespace App\DTO;

use App\Http\Requests\StoreProdutoRequest;

class StoreProdutoDTO
{
    public string $descricao;
    public float $quantidade;
    public string $unidadeMedida;
    public float $precoCusto;
    public float $precoVenda;

    public function __construct(string $descricao, float $quantidade, string $unidadeMedida, float $precoCusto, float $precoVenda)
    {
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->unidadeMedida = $unidadeMedida;
        $this->precoCusto = $precoCusto;
        $this->precoVenda = $precoVenda;
    }

    public static function fromRequest(StoreProdutoRequest $request)
    {
        return new self(
            $request->get('descricao'),
            $request->get('quantidade'),
            $request->get('unidadeMedida'),
            $request->get('precoCusto'),
            $request->get('precoVenda')
        );
    }
}
