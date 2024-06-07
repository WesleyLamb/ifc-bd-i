<?php

namespace App\Repositories;

use App\DTO\StoreProdutoDTO;
use App\DTO\UpdateProdutoDTO;
use App\Models\Produto;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function index(Request $request): Collection
    {
        return Produto::get();
    }

    public function getByIdOrFail(string $id): Produto
    {
        return Produto::where('uuid', $id)->firstOrFail();
    }

    public function update(string $id, UpdateProdutoDTO $data): Produto
    {
        $produto = $this->getByIdOrFail($id);

        if ($data->descricaoWasChanged)
            $produto->descricao = $data->descricao;

        if ($data->quantidadeWasChanged)
            $produto->quantidade = $data->quantidade;

        if ($data->unidadeMedidaWasChanged)
            $produto->unidade_medida = $data->unidadeMedida;

        if($data->precoCustoWasChanged)
            $produto->preco_custo = $data->precoCusto;

        if ($data->precoVendaWasChanged)
            $produto->preco_venda = $data->precoVenda;

        $produto->save();

        return $produto->refresh();
    }

    public function store(StoreProdutoDTO $data): Produto
    {
        $produto = new Produto();

        $produto->descricao = $data->descricao;
        $produto->quantidade = $data->quantidade;
        $produto->unidade_medida = $data->unidadeMedida;
        $produto->preco_custo = $data->precoCusto;
        $produto->preco_venda = $data->precoVenda;

        $produto->save();
        return $produto->refresh();
    }

    public function delete(string $id): bool
    {
        $this->getByIdOrFail($id)->delete();
        return true;
    }
}