<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Http\Resources\CargoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface CargoServiceInterface{
    public function index(Request $request): AnonymousResourceCollection;

    public function show(Request $request): CargoResource;

    public function store(StoreCargoRequest $request): CargoResource;

    public function update(UpdateCargoRequest $request): CargoResource;

    public function delete(Request $request): bool;
}