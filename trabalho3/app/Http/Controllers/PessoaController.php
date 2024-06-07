<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Services\Contracts\PessoaServiceInterface;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public PessoaServiceInterface $pessoaService;

    public function __construct(PessoaServiceInterface $pessoaService)
    {
        $this->pessoaService = $pessoaService;
    }

    public function index(Request $request)
    {
        return $this->pessoaService->index($request);
    }

    public function store(StorePessoaRequest $request)
    {
        return $this->pessoaService->store($request);
    }

    public function show(Request $request)
    {
        return $this->pessoaService->show($request);
    }

    public function update(UpdatePessoaRequest $request)
    {
        return $this->pessoaService->update($request);
    }

    public function delete(Request $request)
    {
        $this->pessoaService->delete($request);
        return response('', 204);
    }
}
