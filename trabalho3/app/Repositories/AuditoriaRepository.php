<?php

namespace App\Repositories;

use App\Models\Auditoria;
use App\Repositories\Contracts\AuditoriaRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AuditoriaRepository implements AuditoriaRepositoryInterface
{
    public function index(Request $request): Collection {
        return Auditoria::get();
    }

    public function getByIdOrFail(string $id): Auditoria
    {
        return Auditoria::where('uuid', $id)->firstOrFail();
    }

    // public function store(CreateAuditoriaDTO $dto);

    // public function update(UpdateAuditoriaDTO $dto);

    // public function getById(string $id);

    // public function delete(string $id): void;
}