<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{

    public function index()
    {
        $instituicaos = Instituicao::all();
        return view('instituicao.index', compact('instituicaos'));
    }

    public function aceitar($id)
    {
        $instituicao = Instituicao::find($id);
        $instituicao->autorizado = true;
        $instituicao->update();
        return back()->with(['message' => "Autorizado com sucesso."]);
    }
}
