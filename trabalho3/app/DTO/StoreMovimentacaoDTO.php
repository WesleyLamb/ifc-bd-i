<?php

namespace App\DTO;

use App\Http\Requests\StoreMovimentacaoRequest;

class StoreMovimentacaoDTO
{
    public string $funcionarioId;
    public string $pessoaId;
    public string $tipoMovimentacao;

    public function __construct(string $funcionarioId, string $pessoaId, string $tipoMovimentacao)
    {
        $this->funcionarioId = $funcionarioId;
        $this->pessoaId = $pessoaId;
        $this->tipoMovimentacao = $tipoMovimentacao;
    }

    public static function fromRequest(StoreMovimentacaoRequest $request): self
    {
        return new self(
            $request->get('funcionarioId'),
            $request->get('pessoaId'),
            $request->get('tipoMovimentacao')
        );
    }
}