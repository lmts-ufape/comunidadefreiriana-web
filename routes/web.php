<?php

use App\Models\Instituicao;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $pendentes =  Instituicao::where('autorizado', null)->count();
    $aprovados = Instituicao::where('autorizado', true)->count();
    return view('dashboard', compact('pendentes', 'aprovados'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('instituicao')
    ->name('instituicao.')
    ->group(function () {
        Route::get('/historico/{instituicao}', [InstituicaoController::class, 'historico'])->name('historico');
        Route::post('/historico/{instituicao}/restaurar/{history}', [InstituicaoController::class, 'restaurar'])->name('historico.restaurar');
        Route::get('index', [InstituicaoController::class, 'index'])->name('index');
        Route::get('aceitar/{id}', [InstituicaoController::class, 'aceitar'])->name('aceitar');
        Route::get('reprovar/{id}', [InstituicaoController::class, 'reprovar'])->name('reprovar');
        Route::get('aprovados', [InstituicaoController::class, 'aprovados'])->name('aprovados');
        Route::get('pendentes', [InstituicaoController::class, 'pendentes'])->name('pendentes');
        Route::get('reprovados', [InstituicaoController::class, 'reprovados'])->name('reprovados');
        Route::get('editar/{id}', [InstituicaoController::class, 'edit'])->name('edit');
        Route::get('cadastrar', [InstituicaoController::class, 'cadastrar'])->name('cadastro');
        Route::post('criar', [InstituicaoController::class, 'criar'])->name('criar');
        Route::put('atualizar/{id}', [InstituicaoController::class, 'update'])->name('update');
        Route::get('delete/{id}', [InstituicaoController::class, 'delete'])->name('delete');
    }
);
