<?php

namespace App\Services;

use App\DTO\StoreMovimentacaoItemDTO;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\StoreMovimentacaoItemRequest;
use App\Http\Resources\MovimentacaoItemResource;
use App\Repositories\Contracts\MovimentacaoItemRepositoryInterface;
use App\Services\Contracts\MovimentacaoItemServiceInterface;
use Illuminate\Http\Request;

class MovimentacaoItemService implements MovimentacaoItemServiceInterface
{
    public MovimentacaoItemRepositoryInterface $movimentacaoItemRepository;

    public function __construct(MovimentacaoItemRepositoryInterface $movimentacaoItemRepository)
    {
        $this->movimentacaoItemRepository = $movimentacaoItemRepository;
    }

    public function store(StoreMovimentacaoItemRequest $request): MovimentacaoItemResource
    {
        $dto = StoreMovimentacaoItemDTO::fromRequest($request);
        if ($this->movimentacaoItemRepository->getByProdutoId($request->route('movimentacao_id'), $dto->produtoId))
            throw new DuplicateEntryException('MovimentacaoItem');

        return new MovimentacaoItemResource($this->movimentacaoItemRepository->store($request->route('movimentacao_id'), $dto));
    }

    public function show(Request $request): MovimentacaoItemResource
    {
        return new MovimentacaoItemResource($this->movimentacaoItemRepository->getByIdOrFail($request->route('movimentacao_id'), $request->route('item_id')));
    }

    public function delete(Request $request): bool
    {
        return $this->movimentacaoItemRepository->delete($request->route('movimentacao_id'), $request->route('item_id'));
    }
}