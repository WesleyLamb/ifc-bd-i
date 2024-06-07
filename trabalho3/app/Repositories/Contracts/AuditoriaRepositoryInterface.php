<?php

namespace App\Repositories\Contracts;

use App\Models\Auditoria;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface AuditoriaRepositoryInterface {
    public function index(Request $request): Collection;
    public function getByIdOrFail(string $id): Auditoria;
}