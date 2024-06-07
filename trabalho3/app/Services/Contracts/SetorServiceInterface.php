<?php

namespace App\Services\Contracts;

use App\Http\Requests\StoreSetorRequest;
use App\Http\Requests\UpdateSetorRequest;
use App\Http\Resources\SetorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface SetorServiceInterface
{
    public function index(Request $request): AnonymousResourceCollection;
    public function show(Request $request): SetorResource;
    public function store(StoreSetorRequest $request): SetorResource;
    public function update(UpdateSetorRequest $request): SetorResource;
    public function delete(Request $request): bool;
}