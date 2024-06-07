<?php

namespace App\Repositories\Contracts;

use App\DTO\StoreFuncionarioDTO;
use App\DTO\UpdateFuncionarioDTO;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface FuncionarioRepositoryInterface {
    public function index(Request $request): Collection;

    public function getByCpf(string $cpf): ?Funcionario;

    public function getByIdOrFail(string $id): Funcionario;

    public function store(StoreFuncionarioDTO $data): Funcionario;

    public function update(string $id, UpdateFuncionarioDTO $data): Funcionario;
}