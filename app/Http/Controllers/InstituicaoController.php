<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;
use App\Notifications\InstituicaoAprovada;
use Illuminate\Support\Facades\Notification;

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
        // Notification::send($instituicao, new InstituicaoAprovada($instituicao->email , $instituicao->nome));
        return back()->with(['message' => "Autorizado com sucesso."]);
    }

    public function reprovar($id)
    {
        $instituicao = Instituicao::find($id);
        $instituicao->autorizado = false;
        $instituicao->update();
        // Notification::send($instituicao, new InstituicaoAprovada($instituicao->email , $instituicao->nome));
        return back()->with(['message' => "Reprovado com sucesso."]);
    }

    public function pendentes()
    {

        $instituicaos = Instituicao::where('autorizado', null)->get();
        return view('instituicao.index', compact('instituicaos'));
    }
    public function aprovados()
    {

        $instituicaos = Instituicao::where('autorizado', true)->get();
        return view('instituicao.index', compact('instituicaos'));
    }
}
