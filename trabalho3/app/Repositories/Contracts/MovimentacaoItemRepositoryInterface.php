<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreMovimentacaoItemDTO;
use App\Models\MovimentacaoItem;

interface MovimentacaoItemRepositoryInterface
{
    public function store(string $movimentacaoId, StoreMovimentacaoItemDTO $data): MovimentacaoItem;
    public function getByIdOrFail(string $movimentacaoId, string $id): MovimentacaoItem;
    public function getByProdutoId(string $movimentacaoId, string $produtoId): ?MovimentacaoItem;
    public function delete(string $movimentacaoId, string $id): bool;
}