<?php

namespace App\Services;

use App\DTO\StoreProdutoDTO;
use App\DTO\UpdateProdutoDTO;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoSummaryResource;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Services\Contracts\ProdutoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProdutoService implements ProdutoServiceInterface
{
    public ProdutoRepositoryInterface $produtoRepository;

    public function __construct(ProdutoRepositoryInterface $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return ProdutoSummaryResource::collection($this->produtoRepository->index($request));
    }

    public function show(Request $request): ProdutoResource
    {
        return new ProdutoResource($this->produtoRepository->getByIdOrFail($request->route('produto_id')));
    }

    public function store(StoreProdutoRequest $request): ProdutoResource
    {
        return new ProdutoResource($this->produtoRepository->store(StoreProdutoDTO::fromRequest($request)));
    }

    public function update(UpdateProdutoRequest $request): ProdutoResource
    {
        return new ProdutoResource($this->produtoRepository->update($request->route('produto_id'), UpdateProdutoDTO::fromRequest($request)));
    }

    public function delete(Request $request): bool
    {
        return $this->produtoRepository->delete($request->route('produto_id'));
    }
}