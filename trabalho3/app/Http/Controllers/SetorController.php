<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Services\Contracts\SetorServiceInterface;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    public SetorServiceInterface $setorService;

    public function __construct(SetorServiceInterface $setorService)
    {
        $this->setorService = $setorService;
    }

    public function index(Request $request)
    {
        return $this->setorService->index($request);
    }

    public function show(Request $request)
    {
        return $this->setorService->show($request);
    }

    public function store(StoreSetorRequest $request)
    {
        return $this->setorService->store($request);
    }

    public function update(UpdateSetorRequest $request)
    {
        return $this->setorService->update($request);
    }

    public function delete(Request $request)
    {
        return $this->setorService->delete($request);
    }
}
