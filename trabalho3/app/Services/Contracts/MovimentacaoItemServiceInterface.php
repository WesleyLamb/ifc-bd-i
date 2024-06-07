<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreMovimentacaoItemRequest;
use App\Http\Resources\MovimentacaoItemResource;
use Illuminate\Http\Request;

interface MovimentacaoItemServiceInterface
{
    public function store(StoreMovimentacaoItemRequest $request): MovimentacaoItemResource;
    public function show(Request $request): MovimentacaoItemResource;
    public function delete(Request $request): bool;
}