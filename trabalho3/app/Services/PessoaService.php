<?php

namespace App\Services;

use App\DTO\StorePessoaDTO;
use App\DTO\UpdatePessoaDTO;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Http\Resources\PessoaResource;
use App\Http\Resources\PessoaSummaryResource;
use App\Repositories\Contracts\PessoaRepositoryInterface;
use App\Services\Contracts\PessoaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PessoaService implements PessoaServiceInterface
{
    public PessoaRepositoryInterface $pessoaRepository;

    public function __construct(PessoaRepositoryInterface $pessoaRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return PessoaSummaryResource::collection($this->pessoaRepository->index($request));
    }

    public function store(StorePessoaRequest $request): PessoaResource
    {
        $data = StorePessoaDTO::fromRequest($request);
        if ($this->pessoaRepository->getByCnpjCpf($data->cnpjCpf)) {
            throw new DuplicateEntryException('Pessoa');
        }
        return new PessoaResource($this->pessoaRepository->store($data));
    }

    public function show(Request $request): PessoaResource
    {
        return new PessoaResource($this->pessoaRepository->getByIdOrFail($request->route('pessoa_id')));
    }

    public function update(UpdatePessoaRequest $request): PessoaResource
    {
        $data = UpdatePessoaDTO::fromRequest($request);

        return new PessoaResource($this->pessoaRepository->update($request->route('pessoa_id'), $data));
    }

    public function delete(Request $request): bool
    {
        return $this->pessoaRepository->delete($request->route('pessoa_id'));
    }
}