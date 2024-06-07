<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\MovimentacaoController;
use App\Http\Controllers\MovimentacaoItemController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SetorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auditorias'], function() {
        Route::get('',                  [AuditoriaController::class, 'index']);
        Route::get('{auditoria_id}',    [AuditoriaController::class, 'show']);
    });

    Route::group(['prefix' => 'cargos'], function() {
        Route::get('',                  [CargoController::class, 'index']);
        Route::post('',                 [CargoController::class, 'store']);
        Route::group(['prefix' => '{cargo_id}'], function() {
            Route::get('',              [CargoController::class, 'show']);
            Route::put('',              [CargoController::class, 'update']);
            Route::delete('',           [CargoController::class, 'delete']);
        });
    });

    Route::group(['prefix' => 'pessoas'], function () {
        Route::get('',                  [PessoaController::class, 'index']);
        Route::post('',                 [PessoaController::class, 'store']);
        Route::group(['prefix' => '{pessoa_id}'], function() {
            Route::get('',              [PessoaController::class, 'show']);
            Route::put('',              [PessoaController::class, 'update']);
            Route::delete('',           [PessoaController::class, 'delete']);
        });
    });

    Route::group(['prefix' => 'funcionarios'], function() {
        Route::get('',                  [FuncionarioController::class, 'index']);
        Route::post('',                 [FuncionarioController::class, 'store']);
        Route::group(['prefix' => '{funcionario_id}'], function() {
            Route::get('',              [FuncionarioController::class, 'show']);
            Route::put('',              [FuncionarioController::class, 'update']);
        });
    });

    Route::group(['prefix' => 'movimentacoes'], function() {
        Route::get('',                  [MovimentacaoController::class, 'index']);
        Route::post('',                 [MovimentacaoController::class, 'store']);
        Route::group(['prefix' => '{movimentacao_id}'], function() {
            Route::get('',              [MovimentacaoController::class, 'show']);
            Route::delete('',           [MovimentacaoController::class, 'delete']);
            Route::group(['prefix' => 'itens'], function () {
                Route::post('',         [MovimentacaoItemController::class, 'store']);
                Route::group(['prefix' => '{item_id}'], function() {
                    Route::get('',      [MovimentacaoItemController::class, 'show']);
                    Route::delete('',   [MovimentacaoItemController::class, 'delete']);
                });
            });
        });
    });

    Route::group(['prefix' => 'produtos'], function () {
        Route::get('',                  [ProdutoController::class, 'index']);
        Route::post('',                 [ProdutoController::class, 'store']);
        Route::group(['prefix' => '{produto_id}'], function () {
            Route::get('',              [ProdutoController::class, 'show']);
            Route::put('',              [ProdutoController::class, 'update']);
            Route::delete('',           [ProdutoController::class, 'delete']);
        });
    });

    // Route::group(['prefix' => 'setores'], function () {
    //     Route::get('',                  [SetorController::class, 'index']);
    //     Route::post('',                 [SetorController::class, 'store']);
    //     Route::group(['prefix' => '{setor_id}'], function() {
    //         Route::get('',              [SetorController::class, 'show']);
    //         Route::put('',              [SetorController::class, 'update']);
    //         Route::delete('',           [SetorController::class, 'delete']);
    //     });
    // });
});
