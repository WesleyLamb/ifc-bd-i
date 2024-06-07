<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreCargoDTO;
use App\DTO\UpdateCargoDTO;
use App\Models\Cargo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface CargoRepositoryInterface {
    public function index(Request $request): Collection;
    public function getById(string $id): ?Cargo;
    public function getByIdOrFail(string $id): Cargo;
    public function getByDescricao(string $descricao): ?Cargo;
    public function store(StoreCargoDTO $dto): Cargo;
    public function update(string $id, UpdateCargoDTO $dto): Cargo;
    public function delete(string $id): bool;
}