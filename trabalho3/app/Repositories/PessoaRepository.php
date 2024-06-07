<?php

namespace App\Repositories;

use App\DTO\StorePessoaDTO;
use App\DTO\UpdatePessoaDTO;
use App\Models\Pessoa;
use App\Repositories\Contracts\PessoaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class PessoaRepository implements PessoaRepositoryInterface {
    public function index(Request $request): Collection
    {
        return Pessoa::get();
    }

    public function getByCnpjCpf(string $cnpjCpf): ?Pessoa
    {
        return Pessoa::where('cnpj_cpf', $cnpjCpf)->first();
    }

    public function getByIdOrFail(string $id): Pessoa
    {
        return Pessoa::where('uuid', $id)->firstOrFail();
    }

    public function store(StorePessoaDTO $data): Pessoa
    {
        $pessoa = new Pessoa();
        $pessoa->cnpj_cpf = $data->cnpjCpf;
        $pessoa->razao_social = $data->razaoSocial;
        $pessoa->nome_fantasia = $data->nomeFantasia;
        $pessoa->data_nascimento = $data->dataAbertura;
        $pessoa->save();

        return $pessoa->refresh();
    }

    public function update(string $id, UpdatePessoaDTO $data): Pessoa
    {
        $pessoa = $this->getByIdOrFail($id);
        if ($data->razaoSocialWasChanged)
            $pessoa->razao_social = $data->razaoSocial;

        if ($data->nomeFantasiaWasChanged)
            $pessoa->nome_fantasia = $data->nomeFantasia;

        if ($data->dataAberturaWasChanged)
            $pessoa->data_nascimento = $data->dataAbertura;

        $pessoa->save();

        return $pessoa->refresh();
    }

    public function delete(string $id): bool
    {
        Pessoa::where('uuid', $id)->delete();
        return true;
    }
}