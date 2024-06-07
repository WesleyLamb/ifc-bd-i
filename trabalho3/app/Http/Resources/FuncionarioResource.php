<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FuncionarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'dataNascimento' => $this->data_nascimento,
            'dataAdmissao' => $this->data_admissao,
            'dataDemissao' => $this->data_demissao,
            'cargo' => new CargoSummaryResource($this->cargo),
            'salarioBase' => (float) $this->salario_base
        ];
    }
}
