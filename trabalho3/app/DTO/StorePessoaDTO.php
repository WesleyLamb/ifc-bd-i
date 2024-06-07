<?php

namespace App\DTO;

use App\Http\Requests\StorePessoaRequest;
use Carbon\Carbon;

class StorePessoaDTO {
    public string $cnpjCpf;
    public string $razaoSocial;
    public string $nomeFantasia;
    public Carbon $dataAbertura;

    public function __construct(string $cnpjCpf, string $razaoSocial, string $nomeFantasia, Carbon $dataAbertura)
    {
        $this->cnpjCpf = $cnpjCpf;
        $this->razaoSocial = $razaoSocial;
        $this->nomeFantasia = $nomeFantasia;
        $this->dataAbertura = $dataAbertura;
    }

    public static function fromRequest(StorePessoaRequest $request): self
    {
        return new self(
            $request->get('cnpjCpf'),
            $request->get('razaoSocial'),
            $request->get('nomeFantasia'),
            Carbon::createFromFormat('Y-m-d', $request->get('dataAbertura'))
        );
    }
}