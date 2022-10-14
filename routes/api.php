<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\InstituicaoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('instituicao/')->group(function () {
    Route::post('store', [InstituicaoController::class, 'store']);
    Route::get('index', [InstituicaoController::class, 'index']);
    Route::get('buscar/{busca}', [InstituicaoController::class, 'buscarInstituicao']);
    Route::get('aprovados', [InstituicaoController::class, 'aprovados']);
    Route::get('show/{id}', [InstituicaoController::class, 'show']);
});
