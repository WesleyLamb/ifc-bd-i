<?php

namespace App\DTO;

use App\Http\Requests\StoreMovimentacaoItemRequest;

class StoreMovimentacaoItemDTO
{
    public string $produtoId;
    public float $quantidade;
    public ?float $precoCusto;
    public ?float $precoVenda;

    public function __construct(string $produtoId, float $quantidade, ?float $precoCusto, ?float $precoVenda)
    {
        $this->produtoId = $produtoId;
        $this->quantidade = $quantidade;
        $this->precoCusto = $precoCusto;
        $this->precoVenda = $precoVenda;
    }

    public static function fromRequest(StoreMovimentacaoItemRequest $request)
    {
        return new self(
            $request->get('produtoId'),
            $request->get('quantidade'),
            $request->get('precoCusto'),
            $request->get('precoVenda')
        );
    }
}