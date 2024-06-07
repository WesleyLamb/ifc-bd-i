<?php

namespace App\DTO;

use App\Http\Requests\UpdateCargoRequest;

class UpdateCargoDTO {
    public bool $descricaoWasChanged = false;
    public string $descricao;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public static function fromRequest(UpdateCargoRequest $request) {
        $dto = new self(
            $request->get('descricao')
        );
        if ($request->has('descricao'))
            $dto->descricaoWasChanged = true;

        return $dto;
    }
}