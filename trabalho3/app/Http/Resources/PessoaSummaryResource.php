<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaSummaryResource extends JsonResource
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
            'cnpjCpf' => $this->cnpj_cpf,
            'razaoSocial' => $this->razao_social,
            'nomeFantasia' => $this->nome_fantasia,
        ];
    }
}
