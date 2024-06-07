<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Services\Contracts\FuncionarioServiceInterface;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public FuncionarioServiceInterface $funcionarioService;

    public function __construct(FuncionarioServiceInterface $funcionarioService)
    {
        $this->funcionarioService = $funcionarioService;
    }

    public function index(Request $request)
    {
        return $this->funcionarioService->index($request);
    }

    public function store(StoreFuncionarioRequest $request)
    {
        return $this->funcionarioService->store($request);
    }

    public function show(Request $request)
    {
        return $this->funcionarioService->show($request);
    }

    public function update(UpdateFuncionarioRequest $request)
    {
        return $this->funcionarioService->update($request);
    }
}
