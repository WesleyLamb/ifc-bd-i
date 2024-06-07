<?php

namespace App\Repositories;

use App\DTO\StoreSetorDTO;
use App\DTO\UpdateSetorDTO;
use App\Models\Setor;
use App\Repositories\Contracts\SetorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class SetorRepository implements SetorRepositoryInterface
{
    public function index(Request $request): Collection
    {
        return Setor::get();
    }

    public function getByDescricao(string $descricao): ?Setor
    {
        return Setor::where('setor', $descricao)->first();
    }

    public function getByIdOrFail(string $id): Setor
    {
        return Setor::where('uuid', $id)->firstOrFail();
    }

    public function store(StoreSetorDTO $data): Setor
    {
        $setor = new Setor();
        $setor->setor = $data->descricao;
        $setor->responsavel_id = $data->responsavelId;
        $setor->save();

        return $setor->with('responsael')->refresh();
    }

    public function update(string $id, UpdateSetorDTO $data): Setor
    {
        $setor = $this->getByIdOrFail($id);

        if ($data->descricaoWasChanged)
            $setor->setor = $data->descricao;

        if ($data->responsavelIdWasChanged)
            $setor->responsavel_id = $data->responsavelId;

        $setor->save();
        return $setor->with('responsavel')->refresh();
    }

    public function delete(string $id): bool
    {
        $this->getByIdOrFail($id)->delete();
        return true;
    }
}