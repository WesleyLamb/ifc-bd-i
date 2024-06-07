<?php

namespace App\Repositories;

use App\DTO\StoreFuncionarioDTO;
use App\DTO\UpdateFuncionarioDTO;
use App\Models\Funcionario;
use App\Repositories\Contracts\FuncionarioRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class FuncionarioRepository implements FuncionarioRepositoryInterface {
    public function index(Request $request): Collection
    {
        return Funcionario::get();
    }

    public function getByCpf(string $cpf): ?Funcionario
    {
        return Funcionario::where('cpf', $cpf)->first();
    }

    public function getByIdOrFail(string $id): Funcionario
    {
        return Funcionario::where('uuid', $id)->firstOrFail();
    }

    public function store(StoreFuncionarioDTO $data): Funcionario
    {
        $funcionario = new Funcionario();
        $funcionario->nome = $data->nome;
        $funcionario->cpf = $data->cpf;
        $funcionario->data_nascimento = $data->dataNascimento;
        $funcionario->data_admissao = $data->dataAdmissao;
        $funcionario->cargo_id = $data->cargo->id;
        $funcionario->salario_base = $data->salarioBase;
        $funcionario->save();

        return $funcionario->with('cargo')->refresh();
    }

    public function update(string $id, UpdateFuncionarioDTO $data): Funcionario
    {
        $funcionario = $this->getByIdOrFail($id);

        if ($data->nomeWasChanged)
            $funcionario->nome = $data->nome;

        if ($data->cpfWasChanged)
            $funcionario->cpf = $data->cpf;

        if ($data->dataNascimentoWasChanged)
            $funcionario->data_nascimento = $data->dataNascimento;

        if ($data->dataAdmissaoWasChanged)
            $funcionario->data_admissao = $data->dataAdmissao;

        if ($data->dataDemissaoWasChanged)
            $funcionario->data_demissao = $data->dataDemissao;

        if ($data->cargoWasChanged)
            $funcionario->cargo_id = $data->cargo->id;

        if ($data->salarioBaseWasChanged)
            $funcionario->salario_base = $data->salarioBase;

        $funcionario->save();

        return $funcionario->refresh();
    }
}