<?php

namespace App\DTO;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Models\Cargo;
use Carbon\Carbon;

class StoreFuncionarioDTO {
    public string $nome;
    public string $cpf;
    public Carbon $dataNascimento;
    public Carbon $dataAdmissao;
    public Cargo $cargo;
    public float $salarioBase;

    public function __construct(string $nome, string $cpf, Carbon $dataNascimento, Carbon $dataAdmissao, float $salarioBase)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->dataAdmissao = $dataAdmissao;
        $this->salarioBase = $salarioBase;
    }

    public static function fromRequest(StoreFuncionarioRequest $request)
    {
        return new self(
            $request->get('nome'),
            $request->get('cpf'),
            Carbon::createFromFormat('Y-m-d',$request->get('dataNascimento')),
            Carbon::createFromFormat('Y-m-d', $request->get('dataAdmissao')),
            $request->get('salarioBase'),
        );
    }
}