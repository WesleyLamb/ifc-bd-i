<?php

namespace App\DTO;

use App\Http\Requests\StoreCargoRequest;

class StoreCargoDTO {
    public string $descricao;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
    }

    public static function fromRequest(StoreCargoRequest $request): self
    {
        return new self(
            $request->get('descricao')
        );
    }
}