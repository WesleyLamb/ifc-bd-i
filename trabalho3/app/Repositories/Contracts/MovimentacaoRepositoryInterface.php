<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreMovimentacaoDTO;
use App\Models\Movimentacao;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface MovimentacaoRepositoryInterface
{
    public function index(Request $request): Collection;

    public function store(StoreMovimentacaoDTO $data): Movimentacao;

    public function getByIdOrFail(string $id): Movimentacao;

    public function delete(string $id): bool;
}