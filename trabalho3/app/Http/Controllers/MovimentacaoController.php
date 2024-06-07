<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimentacaoRequest;
use App\Http\Requests\UpdateMovimentacaoRequest;
use App\Services\Contracts\MovimentacaoServiceInterface;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public MovimentacaoServiceInterface $movimentacaoService;

    public function __construct(MovimentacaoServiceInterface $movimentacaoService)
    {
        $this->movimentacaoService = $movimentacaoService;
    }

    public function index(Request $request)
    {
        return $this->movimentacaoService->index($request);
    }

    public function store(StoreMovimentacaoRequest $request)
    {
        return $this->movimentacaoService->store($request);
    }

    public function show(Request $request)
    {
        return $this->movimentacaoService->show($request);
    }

    public function delete(Request $request)
    {
        $this->movimentacaoService->delete($request);
        return response('', 204);
    }
}
