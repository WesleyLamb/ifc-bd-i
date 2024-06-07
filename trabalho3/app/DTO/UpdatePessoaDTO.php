<?php

namespace App\DTO;

use App\Http\Requests\UpdatePessoaRequest;
use Carbon\Carbon;

class UpdatePessoaDTO {
    public bool $razaoSocialWasChanged = false;
    public ?string $razaoSocial;
    public bool $nomeFantasiaWasChanged = false;
    public ?string $nomeFantasia;
    public bool $dataAberturaWasChanged = false;
    public ?Carbon $dataAbertura;

    public function __construct(?string $razaoSocial, ?string $nomeFantasia, ?Carbon $dataAbertura)
    {
        $this->razaoSocial = $razaoSocial;
        $this->nomeFantasia = $nomeFantasia;
        $this->dataAbertura = $dataAbertura;
    }

    public static function fromRequest(UpdatePessoaRequest $request): self
    {
        $dto = new self(
            $request->get('razaoSocial'),
            $request->get('nomeFantasia'),
            $request->has('dataAbertura') ? Carbon::createFromFormat('Y-m-d', $request->get('dataAbertura')) : null
        );

        if ($request->has('razaoSocial'))
            $dto->razaoSocialWasChanged = true;

        if ($request->has('nomeFantasia'))
            $dto->nomeFantasiaWasChanged = true;

        if ($request->has('dataAbertura'))
            $dto->dataAberturaWasChanged = true;

        return $dto;
    }
}