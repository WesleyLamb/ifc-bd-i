<?php

namespace App\Repositories;

use App\DTO\StoreMovimentacaoDTO;
use App\Models\Movimentacao;
use App\Repositories\Contracts\FuncionarioRepositoryInterface;
use App\Repositories\Contracts\MovimentacaoRepositoryInterface;
use App\Repositories\Contracts\PessoaRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MovimentacaoRepository implements MovimentacaoRepositoryInterface
{
    public FuncionarioRepositoryInterface $funcionarioRepository;
    public PessoaRepositoryInterface $pessoaRepository;

    public function __construct(FuncionarioRepositoryInterface $funcionarioRepository, PessoaRepositoryInterface $pessoaRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
        $this->pessoaRepository = $pessoaRepository;
    }

    public function index(Request $request): Collection
    {
        return Movimentacao::get();
    }

    public function store(StoreMovimentacaoDTO $data): Movimentacao
    {
        $movimentacao = new Movimentacao();
        $movimentacao->funcionario_id = $this->funcionarioRepository->getByIdOrFail($data->funcionarioId)->id;
        $movimentacao->cliente_fornecedor_id = $this->pessoaRepository->getByIdOrFail($data->pessoaId)->id;
        $movimentacao->tipo_movimentacao = $data->tipoMovimentacao;
        $movimentacao->save();

        return $movimentacao->refresh();
    }

    public function getByIdOrFail(string $id): Movimentacao
    {
        return Movimentacao::where('uuid', $id)->firstOrFail();
    }

    public function delete(string $id): bool
    {
        $this->getByIdOrFail($id)->delete();
        return true;
    }
}