<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovimentacaoResource extends JsonResource
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
            'pessoa' => new PessoaSummaryResource($this->pessoa),
            'funcionario' => new FuncionarioSummaryResource($this->funcionario),
            'tipoMovimentacao' => $this->tipo_movimentacao,
            'itens' => MovimentacaoItemSummaryResource::collection($this->itens)
        ];
    }
}
