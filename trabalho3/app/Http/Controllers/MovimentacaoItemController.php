<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimentacaoItemRequest;
use App\Services\Contracts\MovimentacaoItemServiceInterface;
use Illuminate\Http\Request;

class MovimentacaoItemController extends Controller
{
    public MovimentacaoItemServiceInterface $movimentacaoItemService;

    public function __construct(MovimentacaoItemServiceInterface $movimentacaoItemService)
    {
        $this->movimentacaoItemService = $movimentacaoItemService;
    }

    public function store(StoreMovimentacaoItemRequest $request)
    {
        return $this->movimentacaoItemService->store($request);
    }

    public function show(Request $request)
    {
        return $this->movimentacaoItemService->show($request);
    }

    public function delete(Request $request)
    {
        $this->movimentacaoItemService->delete($request);
        return response('', 204);
    }
}
