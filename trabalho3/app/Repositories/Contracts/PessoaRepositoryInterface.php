<?php

namespace App\Repositories\Contracts;

use App\DTO\StorePessoaDTO;
use App\DTO\UpdatePessoaDTO;
use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface PessoaRepositoryInterface {
    public function index(Request $request): Collection;
    public function getByCnpjCpf(string $cnpjCpf): ?Pessoa;
    public function getByIdOrFail(string $id): Pessoa;
    public function store(StorePessoaDTO $data): Pessoa;
    public function update(string $id, UpdatePessoaDTO $data): Pessoa;
    public function delete(string $id): bool;
}