<?php

namespace App\Services;

use App\DTO\StoreMovimentacaoDTO;
use App\Http\Requests\StoreMovimentacaoRequest;
use App\Http\Resources\MovimentacaoResource;
use App\Http\Resources\MovimentacaoSummaryResource;
use App\Repositories\Contracts\MovimentacaoRepositoryInterface;
use App\Services\Contracts\MovimentacaoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class movimentacaoService implements MovimentacaoServiceInterface
{
    public MovimentacaoRepositoryInterface $movimentacaoRepository;

    public function __construct(MovimentacaoRepositoryInterface $movimentacaoRepository)
    {
        $this->movimentacaoRepository = $movimentacaoRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return MovimentacaoSummaryResource::collection($this->movimentacaoRepository->index($request));
    }

    public function store(StoreMovimentacaoRequest $request): MovimentacaoResource
    {
        return new MovimentacaoResource($this->movimentacaoRepository->store(StoreMovimentacaoDTO::fromRequest($request)));
    }

    public function show(Request $request): MovimentacaoResource
    {
        return new MovimentacaoResource($this->movimentacaoRepository->getByIdOrFail($request->route('movimentacao_id')));
    }

    public function delete(Request $request): bool
    {
        return $this->movimentacaoRepository->delete($request->route('movimentacao_id'));
    }
}