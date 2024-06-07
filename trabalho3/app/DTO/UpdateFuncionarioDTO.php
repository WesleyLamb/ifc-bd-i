<?php

namespace App\DTO;

use App\Http\Requests\DemitirFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Models\Cargo;
use Carbon\Carbon;

class UpdateFuncionarioDTO {
    public bool $nomeWasChanged = false;
    public ?string $nome;
    public bool $cpfWasChanged = false;
    public ?string $cpf;
    public bool $dataNascimentoWasChanged = false;
    public ?Carbon $dataNascimento;
    public bool $dataAdmissaoWasChanged = false;
    public ?Carbon $dataAdmissao;
    public bool $dataDemissaoWasChanged = false;
    public ?Carbon $dataDemissao;
    public bool $cargoWasChanged = false;
    public ?Cargo $cargo;
    public bool $salarioBaseWasChanged = false;
    public ?float $salarioBase;

    public function __construct(?string $nome, ?string $cpf, ?Carbon $dataNascimento, ?Carbon $dataAdmissao, ?Carbon $dataDemissao, ?float $salarioBase)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNascimento = $dataNascimento;
        $this->dataAdmissao = $dataAdmissao;
        $this->dataDemissao = $dataDemissao;
        $this->salarioBase = $salarioBase;
    }

    public static function fromRequest(UpdateFuncionarioRequest $request)
    {
        $dto = new self(
            $request->get('nome'),
            $request->get('cpf'),
            $request->get('dataNascimento'),
            $request->get('dataAdmissao') ? Carbon::createFromFormat('Y-m-d', $request->get('dataAdmissao')) : null,
            $request->get('dataDemissao') ? Carbon::createFromFormat('Y-m-d', $request->get('dataDemissao')) : null,
            $request->get('salarioBase'),
        );

        if ($request->has('nome'))
            $dto->nomeWasChanged = true;

        if ($request->has('cpf'))
            $dto->cpfWasChanged = true;

        if ($request->has('dataNascimento'))
            $dto->dataNascimentoWasChanged = true;

        if ($request->has('dataAdmissao'))
            $dto->dataAdmissaoWasChanged = true;

        if ($request->has('dataDemissao'))
            $dto->dataDemissaoWasChanged = true;

        if ($request->has('salarioBase'))
            $dto->salarioBase = true;

        return $dto;
    }
}