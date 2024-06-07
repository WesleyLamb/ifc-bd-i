<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
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
            'dataAbertura' => $this->data_nascimento,
            'criado_em' => $this->criado_em,
            'atualizado_em' => $this->atualizado_em,
        ];
    }
}
