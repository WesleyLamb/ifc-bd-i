<?php

namespace App\Repositories;

use App\DTO\StoreCargoDTO;
use App\DTO\UpdateCargoDTO;
use App\Models\Cargo;
use App\Repositories\Contracts\CargoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class CargoRepository implements CargoRepositoryInterface {
    public function index(Request $request): Collection
    {
        return Cargo::get();
    }

    public function getById(string $id): ?Cargo
    {
        return Cargo::where('id', $id)->first();
    }

    public function getByIdOrFail(string $id): Cargo
    {
        return Cargo::where('uuid', $id)->firstOrFail();
    }

    public function getByDescricao(string $descricao): ?Cargo
    {
        return Cargo::where('descricao', $descricao)->first();
    }

    public function store(StoreCargoDTO $dto): Cargo
    {
        $cargo = new Cargo();

        $cargo->descricao = $dto->descricao;
        $cargo->save();

        return $cargo->refresh();
    }

    public function update(string $id, UpdateCargoDTO $dto): Cargo
    {
        $cargo = $this->getByIdOrFail($id);

        if ($dto->descricaoWasChanged)
            $cargo->descricao = $dto->descricao;

        $cargo->save();
        return $cargo->refresh();
    }

    public function delete(string $id): bool
    {
        $this->getByIdOrFail($id)->delete();
        return true;
    }
}