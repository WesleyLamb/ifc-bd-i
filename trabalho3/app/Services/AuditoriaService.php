<?php

namespace App\Services;

use App\Http\Resources\AuditoriaResource;
use App\Http\Resources\AuditoriaSummaryResource;
use App\Repositories\Contracts\AuditoriaRepositoryInterface;
use App\Services\Contracts\AuditoriaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuditoriaService implements AuditoriaServiceInterface {

    public AuditoriaRepositoryInterface $auditoriaRepository;

    public function __construct(AuditoriaRepositoryInterface $auditoriaRepository)
    {
        $this->auditoriaRepository = $auditoriaRepository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return AuditoriaSummaryResource::collection($this->auditoriaRepository->index($request));
    }

    public function show(Request $request): AuditoriaResource
    {
        return new AuditoriaResource($this->auditoriaRepository->getByIdOrFail($request->route('auditoria_id')));
    }
}