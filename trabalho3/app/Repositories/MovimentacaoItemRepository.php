<?php

namespace App\Repositories;

use App\DTO\StoreMovimentacaoItemDTO;
use App\Models\MovimentacaoItem;
use App\Repositories\Contracts\MovimentacaoItemRepositoryInterface;
use App\Repositories\Contracts\MovimentacaoRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;

class MovimentacaoItemRepository implements MovimentacaoItemRepositoryInterface
{
    public MovimentacaoRepositoryInterface $movimentacaoRepository;
    public ProdutoRepositoryInterface $produtoRepository;

    public function __construct(MovimentacaoRepositoryInterface $movimentacaoRepository, ProdutoRepositoryInterface $produtoRepository)
    {
        $this->movimentacaoRepository = $movimentacaoRepository;
        $this->produtoRepository = $produtoRepository;
    }

    public function store(string $movimentacaoId, StoreMovimentacaoItemDTO $data): MovimentacaoItem
    {
        $produto = $this->produtoRepository->getByIdOrFail($data->produtoId);

        $item = new MovimentacaoItem();
        $item->movimentacao_id = $this->movimentacaoRepository->getByIdOrFail($movimentacaoId)->id;
        $item->produto_id = $produto->id;
        $item->quantidade = $data->quantidade;
        $item->preco_custo = $data->precoCusto ?? $produto->preco_custo;
        $item->preco_venda = $data->precoVenda ?? $produto->preco_venda;
        $item->save();

        return $item->refresh();
    }

    public function getByIdOrFail(string $movimentacaoId, string $id): MovimentacaoItem
    {
        return MovimentacaoItem::whereHas('movimentacao', function($q) use($movimentacaoId) {
            return $q->where('uuid', $movimentacaoId);
        })->firstOrFail();
    }

    public function getByProdutoId(string $movimentacaoId, string $produtoId): ?MovimentacaoItem
    {
        return MovimentacaoItem::where('movimentacao_id', $this->movimentacaoRepository->getByIdOrFail($movimentacaoId)->id, $this->produtoRepository->getByIdOrFail($produtoId))->first();
    }

    public function delete(string $movimentacaoId, string $id): bool
    {
        $this->getByIdOrFail($movimentacaoId, $id)->delete();
        return true;
    }
}