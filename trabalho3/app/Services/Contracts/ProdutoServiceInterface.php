<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Http\Resources\ProdutoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface ProdutoServiceInterface
{
    public function index(Request $request): AnonymousResourceCollection;
    public function show(Request $request): ProdutoResource;
    public function store(StoreProdutoRequest $request): ProdutoResource;
    public function update(UpdateProdutoRequest $request): ProdutoResource;
    public function delete(Request $request): bool;
}