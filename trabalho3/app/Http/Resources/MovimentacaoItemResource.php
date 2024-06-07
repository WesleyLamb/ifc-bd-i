<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovimentacaoItemResource extends JsonResource
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
            'produto' => new ProdutoSummaryResource($this->produto),
            'quantidade' => (float) $this->quantidade,
            'precoCusto' => (float) $this->preco_custo,
            'precoVenda' => (float) $this->preco_venda,
            'criadoEm' => $this->criado_em
        ];
    }
}
