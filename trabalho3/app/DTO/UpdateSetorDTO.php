<?php

namespace App\DTO;

use App\Http\Requests\UpdateSetorRequest;

class UpdateSetorDTO
{
    public bool $descricaoWasChanged = false;
    public ?string $descricao;
    public bool $responsavelIdWasChanged = false;
    public ?string $responsavelId;

    public function __construct(string $descricao, string $responsavelId)
    {
        $this->descricao = $descricao;
        $this->responsavelId = $responsavelId;
    }

    public static function fromRequest(UpdateSetorRequest $request)
    {
        $dto = new self(
            $request->get('descricao'),
            $request->get('responsavelId')
        );

        if ($request->has('descricao'))
            $dto->descricaoWasChanged = true;

        if ($request->has('responsavelId'))
            $dto->responsavelIdWasChanged = true;

        return $dto;
    }
}