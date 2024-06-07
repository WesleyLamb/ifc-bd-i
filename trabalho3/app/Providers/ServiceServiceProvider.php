<?php

namespace App\Providers;

use App\Services\AuditoriaService;
use App\Services\CargoService;
use App\Services\Contracts\AuditoriaServiceInterface;
use App\Services\Contracts\CargoServiceInterface;
use App\Services\Contracts\FuncionarioServiceInterface;
use App\Services\Contracts\MovimentacaoItemServiceInterface;
use App\Services\Contracts\MovimentacaoServiceInterface;
use App\Services\Contracts\PessoaServiceInterface;
use App\Services\Contracts\ProdutoServiceInterface;
use App\Services\FuncionarioService;
use App\Services\MovimentacaoItemService;
use App\Services\MovimentacaoService;
use App\Services\PessoaService;
use App\Services\ProdutoService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuditoriaServiceInterface::class,
            AuditoriaService::class
        );

        $this->app->bind(
            CargoServiceInterface::class,
            CargoService::class
        );

        $this->app->bind(
            PessoaServiceInterface::class,
            PessoaService::class
        );

        $this->app->bind(
            FuncionarioServiceInterface::class,
            FuncionarioService::class
        );

        $this->app->bind(
            MovimentacaoServiceInterface::class,
            MovimentacaoService::class
        );

        $this->app->bind(
            MovimentacaoItemServiceInterface::class,
            MovimentacaoItemService::class
        );

        $this->app->bind(
            ProdutoServiceInterface::class,
            ProdutoService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
