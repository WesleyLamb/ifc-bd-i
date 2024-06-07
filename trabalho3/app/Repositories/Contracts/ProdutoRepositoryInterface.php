<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreProdutoDTO;
use App\DTO\UpdateProdutoDTO;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProdutoRepositoryInterface
{
    public function index(Request $request): Collection;
    public function getByIdOrFail(string $id): Produto;
    public function store(StoreProdutoDTO $data): Produto;
    public function update(string $id, UpdateProdutoDTO $data): Produto;
    public function delete(string $id): bool;
}