<?php

namespace App\Services;

use App\DTO\StoreFuncionarioDTO;
use App\DTO\UpdateFuncionarioDTO;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\DemitirFuncionarioRequest;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Http\Resources\FuncionarioResource;
use App\Http\Resources\FuncionarioSummaryResource;
use App\Repositories\Contracts\CargoRepositoryInterface;
use App\Repositories\Contracts\FuncionarioRepositoryInterface;
use App\Services\Contracts\FuncionarioServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FuncionarioService implements FuncionarioServiceInterface
{
    public FuncionarioRepositoryInterface $funcionarioRepository;
    public CargoRepositoryInterface $cargoRepository;

    public function __construct(FuncionarioRepositoryInterface $funcionarioRepository, CargoRepositoryInterface $cargoRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
        $this->cargoRepository = $cargoRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return FuncionarioSummaryResource::collection($this->funcionarioRepository->index($request));
    }

    public function store(StoreFuncionarioRequest $request): FuncionarioResource
    {
        $data = StoreFuncionarioDTO::fromRequest($request);
        if ($this->funcionarioRepository->getByCpf($data->cpf)) {
            throw new DuplicateEntryException('Funcionario');
        }
        $data->cargo = $this->cargoRepository->getByIdOrFail($request->get('cargoId'));

        return new FuncionarioResource($this->funcionarioRepository->store($data));
    }

    public function show(Request $request): FuncionarioResource
    {
        return new FuncionarioResource($this->funcionarioRepository->getByIdOrFail($request->route('funcionario_id')));
    }

    public function update(UpdateFuncionarioRequest $request): FuncionarioResource
    {
        $data = UpdateFuncionarioDTO::fromRequest($request);

        return new FuncionarioResource($this->funcionarioRepository->update($request->route('funcionario_id'), $data));
    }
}