<?php

namespace App\Services;

use App\DTO\StoreCargoDTO;
use App\DTO\UpdateCargoDTO;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Resources\CargoResource;
use App\Http\Resources\CargoSummaryResource;
use App\Repositories\Contracts\CargoRepositoryInterface;
use App\Services\Contracts\CargoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CargoService implements CargoServiceInterface {
    public CargoRepositoryInterface $cargoRepository;

    public function __construct(CargoRepositoryInterface $cargoRepository)
    {
        $this->cargoRepository = $cargoRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return CargoSummaryResource::collection($this->cargoRepository->index($request));
    }

    public function show(Request $request): CargoResource
    {
        return new CargoResource($this->cargoRepository->getByIdOrFail($request->route('cargo_id')));
    }

    public function store(StoreCargoRequest $request): CargoResource
    {
        $data = StoreCargoDTO::fromRequest($request);

        if ($this->cargoRepository->getByDescricao($data->descricao)) {
            throw new DuplicateEntryException("Cargo");
        }

        return new CargoResource($this->cargoRepository->store($data));
    }

    public function update(UpdateCargoRequest $request): CargoResource
    {
        $data = UpdateCargoDTO::fromRequest($request);

        return new CargoResource($this->cargoRepository->update($request->route('cargo_id'), $data));
    }

    public function delete(Request $request): bool
    {
        return $this->cargoRepository->delete($request->route('cargo_id'));
    }
}