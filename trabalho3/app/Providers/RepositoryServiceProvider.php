<?php

namespace App\Providers;

use App\Repositories\AuditoriaRepository;
use App\Repositories\CargoRepository;
use App\Repositories\Contracts\AuditoriaRepositoryInterface;
use App\Repositories\Contracts\CargoRepositoryInterface;
use App\Repositories\Contracts\FuncionarioRepositoryInterface;
use App\Repositories\Contracts\MovimentacaoItemRepositoryInterface;
use App\Repositories\Contracts\MovimentacaoRepositoryInterface;
use App\Repositories\Contracts\PessoaRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\FuncionarioRepository;
use App\Repositories\MovimentacaoItemRepository;
use App\Repositories\MovimentacaoRepository;
use App\Repositories\PessoaRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuditoriaRepositoryInterface::class,
            AuditoriaRepository::class
        );

        $this->app->bind(
            CargoRepositoryInterface::class,
            CargoRepository::class
        );

        $this->app->bind(
            PessoaRepositoryInterface::class,
            PessoaRepository::class
        );

        $this->app->bind(
            FuncionarioRepositoryInterface::class,
            FuncionarioRepository::class
        );

        $this->app->bind(
            MovimentacaoRepositoryInterface::class,
            MovimentacaoRepository::class
        );

        $this->app->bind(
            MovimentacaoItemRepositoryInterface::class,
            MovimentacaoItemRepository::class
        );

        $this->app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class
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
