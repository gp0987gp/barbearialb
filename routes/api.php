<?php

use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/servico', [ServicoController::class, 'barbearialb']);

Route::get('descricao/{descricao}', [ServicoController::class, 'pesquisarPorDescricao']);

Route::post('nome/{nome}', [ServicoController::class, 'pesquisarPorNome']);

Route::delete('delete/{id}', [ServicoController::class, 'excluir']);

Route::get('all', [ServicoController::class, 'retornarTodos']);

Route::put('update', [ServicoController::class, 'update']);