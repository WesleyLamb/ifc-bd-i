<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreMovimentacaoRequest;
use App\Http\Resources\MovimentacaoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface MovimentacaoServiceInterface
{
    public function index(Request $request): AnonymousResourceCollection;

    public function store(StoreMovimentacaoRequest $request): MovimentacaoResource;

    public function show(Request $request): MovimentacaoResource;

    public function delete(Request $request): bool;
}