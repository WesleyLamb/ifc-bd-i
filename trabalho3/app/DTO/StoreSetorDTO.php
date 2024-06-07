<?php

namespace App\DTO;

use App\Http\Requests\StoreSetorRequest;

class StoreSetorDTO
{
    public string $descricao;
    public string $responsavelId;

    public function __construct(string $descricao, string $responsavelId)
    {
        $this->descricao = $descricao;
        $this->responsavelId = $responsavelId;
    }

    public static function fromRequest(StoreSetorRequest $request)
    {
        return new self(
            $request->get('descricao'),
            $request->get('responsavelId')
        );
    }
}