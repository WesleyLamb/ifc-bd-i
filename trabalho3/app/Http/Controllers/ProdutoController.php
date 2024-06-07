<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Services\Contracts\ProdutoServiceInterface;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public ProdutoServiceInterface $produtoService;

    public function __construct(ProdutoServiceInterface $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    public function index(Request $request)
    {
        return $this->produtoService->index($request);
    }

    public function show(Request $request)
    {
        return $this->produtoService->show($request);
    }

    public function store(StoreProdutoRequest $request)
    {
        return $this->produtoService->store($request);
    }

    public function update(UpdateProdutoRequest $request)
    {
        return $this->produtoService->update($request);
    }

    public function delete(Request $request)
    {
        $this->produtoService->delete($request);
        return response('', 204);
    }
}
