<?php

namespace App\DTO;

use App\Http\Requests\UpdateProdutoRequest;

class UpdateProdutoDTO
{
    public bool $descricaoWasChanged = false;
    public ?string $descricao;
    public bool $quantidadeWasChanged = false;
    public ?float $quantidade;
    public bool $unidadeMedidaWasChanged = false;
    public ?string $unidadeMedida;
    public bool $precoCustoWasChanged = false;
    public ?float $precoCusto;
    public bool $precoVendaWasChanged = false;
    public ?float $precoVenda;

    public function __construct(?string $descricao, ?float $quantidade, ?string $unidadeMedida, ?float $precoCusto, ?float $precoVenda)
    {
        $this->descricao = $descricao;
        $this->quantidade = $quantidade;
        $this->unidadeMedida = $unidadeMedida;
        $this->precoCusto = $precoCusto;
        $this->precoVenda = $precoVenda;
    }

    public static function fromRequest(UpdateProdutoRequest $request)
    {
        $dto = new self(
            $request->get('descricao'),
            $request->get('quantidade'),
            $request->get('unidadeMedida'),
            $request->get('precoCusto'),
            $request->get('precoVenda')
        );
        if ($request->has('descricao'))
            $dto->descricaoWasChanged = true;

        if ($request->has('quantidade'))
            $dto->quantidadeWasChanged = true;

        if ($request->has('unidadeMedida'))
            $dto->quantidadeWasChanged = true;

        if ($request->has('precoCusto'))
            $dto->precoCustoWasChanged = true;

        if ($request->has('precoVenda'))
            $dto->precoVendaWasChanged = true;

        return $dto;
    }
}
