<?php

namespace App\Services;

use App\DTO\StoreSetorDTO;
use App\DTO\UpdateSetorDTO;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Http\Resources\SetorResource;
use App\Http\Resources\SetorSummaryResource;
use App\Repositories\Contracts\SetorRepositoryInterface;
use App\Services\Contracts\SetorServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SetorSevice implements SetorServiceInterface
{
    public SetorRepositoryInterface $setorRepository;

    public function __construct(SetorRepositoryInterface $setorRepository)
    {
        $this->setorRepository = $setorRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return SetorSummaryResource::collection($this->setorRepository->index($request));
    }

    public function show(Request $request): SetorResource
    {
        return new SetorResource($this->setorRepository->getByIdOrFail($request->route('setor_id')));
    }

    public function store(StoreSetorRequest $request): SetorResource
    {
        $data = StoreSetorDTO::fromRequest($request);
        if ($this->setorRepository->getByDescricao($data->descricao))
            throw new DuplicateEntryException('Setor');
        return new SetorResource($this->setorRepository->store($data));
    }

    public function update(UpdateSetorRequest $request): SetorResource
    {
        return new SetorResource($this->setorRepository->update($request->route('setor_id'), UpdateSetorDTO::fromRequest($request)));
    }

    public function delete(Request $request): bool
    {
        return $this->setorRepository->delete($request->route('setor_id'));
    }
}