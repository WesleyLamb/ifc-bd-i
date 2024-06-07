<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuditoriaResource;
use App\Services\Contracts\AuditoriaServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AuditoriaController extends Controller
{
    public AuditoriaServiceInterface $auditoriaService;

    public function __construct(AuditoriaServiceInterface $auditoriaService) {
        $this->auditoriaService = $auditoriaService;
    }

    public function index(Request $request): AnonymousResourceCollection {
        return $this->auditoriaService->index($request);
    }

    public function show(Request $request): AuditoriaResource {
        return $this->auditoriaService->show($request);
    }
}
