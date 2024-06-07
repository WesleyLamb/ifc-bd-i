<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Resources\CargoResource;
use App\Services\Contracts\CargoServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CargoController extends Controller
{
    public CargoServiceInterface $cargoService;

    public function __construct(CargoServiceInterface $cargoService)
    {
        $this->cargoService = $cargoService;
    }

    public function index(Request $request): AnonymousResourceCollection {
        return $this->cargoService->index($request);
    }

    public function show(Request $request): CargoResource {
        return $this->cargoService->show($request);
    }

    public function store(StoreCargoRequest $request): CargoResource {
        return $this->cargoService->store($request);
    }

    public function update(UpdateCargoRequest $request): CargoResource
    {
        return $this->cargoService->update($request);
    }

    public function delete(Request $request)
    {
        $this->cargoService->delete($request);
        return response('', 204);
    }
}
