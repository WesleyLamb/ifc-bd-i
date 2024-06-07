<?php

namespace App\Services\Contracts;

use App\Http\Requests\DemitirFuncionarioRequest;
use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Http\Resources\FuncionarioResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface FuncionarioServiceInterface
{
    public function index(Request $request): AnonymousResourceCollection;

    public function store(StoreFuncionarioRequest $request): FuncionarioResource;

    public function show(Request $request): FuncionarioResource;

    public function update(UpdateFuncionarioRequest $request): FuncionarioResource;
}