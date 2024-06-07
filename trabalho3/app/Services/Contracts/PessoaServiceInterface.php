<?php

namespace App\Services\Contracts;

use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Http\Resources\PessoaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface PessoaServiceInterface {
    public function index(Request $request): AnonymousResourceCollection;

    public function store(StorePessoaRequest $request): PessoaResource;

    public function show(Request $request): PessoaResource;

    public function update(UpdatePessoaRequest $request): PessoaResource;

    public function delete(Request $request): bool;
}