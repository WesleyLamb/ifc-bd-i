<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreSetorDTO;
use App\DTO\UpdateSetorDTO;
use App\Models\Setor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface SetorRepositoryInterface {
    public function index(Request $request): Collection;
    public function getByDescricao(string $descricao): ?Setor;
    public function getByIdOrFail(string $id): Setor;
    public function store(StoreSetorDTO $data): Setor;
    public function update(string $id, UpdateSetorDTO $data): Setor;
    public function delete(string $id): bool;
}