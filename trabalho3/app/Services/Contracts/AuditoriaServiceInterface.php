<?php

namespace App\Services\Contracts;

use App\Http\Resources\AuditoriaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface AuditoriaServiceInterface {
    public function index(Request $request): AnonymousResourceCollection;

    public function show(Request $request): AuditoriaResource;
}