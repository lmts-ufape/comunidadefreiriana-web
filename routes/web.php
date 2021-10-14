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

Route::middleware(['auth:sanctum', 'verified'])->prefix('instituicao')->group(function () {
    Route::get('index', [InstituicaoController::class, 'index'])->name('instituicao.index');
    Route::get('aceitar/{id}', [InstituicaoController::class, 'aceitar'])->name('instituicao.aceitar');
    Route::get('reprovar/{id}', [InstituicaoController::class, 'reprovar'])->name('instituicao.reprovar');
    Route::get('aprovados', [InstituicaoController::class, 'aprovados'])->name('instituicao.aprovados');
    Route::get('pendentes', [InstituicaoController::class, 'pendentes'])->name('instituicao.pendentes');
    Route::get('reprovados', [InstituicaoController::class, 'reprovados'])->name('instituicao.reprovados');
    Route::get('editar/{id}', [InstituicaoController::class, 'edit'])->name('instituicao.edit');
    Route::get('cadastrar', [InstituicaoController::class, 'cadastrar'])->name('instituicao.cadastro');
    Route::post('criar', [InstituicaoController::class, 'criar'])->name('instituicao.criar');
    Route::put('atualizar/{id}', [InstituicaoController::class, 'update'])->name('instituicao.update');
    Route::get('delete/{id}', [InstituicaoController::class, 'delete'])->name('instituicao.delete');
});
