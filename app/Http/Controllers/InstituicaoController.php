<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\InstituicaoAprovada;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Panoscape\History\History;

class InstituicaoController extends Controller
{

    public function index()
    {
        return view('instituicao.index');
    }

    public function cadastrar()
    {
        return view('instituicao.cadastro');
    }

    public function historico(Instituicao $instituicao)
    {
        $histories = $instituicao->histories->sortByDesc('performed_at')->map(function($history) {
            $history->user = User::find($history->user_id);
            return $history;
        });
        return view('instituicao.historico', ['instituicao' => $instituicao, 'histories' => $histories]);
    }

    public function restaurar(Instituicao $instituicao, History $history)
    {
        if ($history->model_type != 'App\Models\Instituicao' || $history->model_id != $instituicao->id) {
            return redirect()->back()->with('danger', 'Não é possível restaurar um histórico de outra instituição');
        }
        foreach ($history->meta as $item) {
            $instituicao->{$item['key']} = $item['old'];
        }
        $instituicao->save();
        return redirect()->back()->with('success', 'Alterações foram desfeitas');
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

    public function reprovados()
    {
        $instituicaos = Instituicao::where('autorizado', false)->get();
        return view('instituicao.index', compact('instituicaos'));
    }

    public function edit($id)
    {
        $instituicao = Instituicao::find($id);
        return view('instituicao.edit', compact('instituicao'));
    }

    public function criar(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'estado' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'site' => 'nullable|string|max:255',
            'coordenador' => 'nullable|string|max:255',
            'datafundacao' => 'nullable|date|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'image' => 'nullable|file',
            'informacao' => 'nullable|max:255',
        ]);

        if (!$this->is_number($request->latitude) || $request->latitude < -90 || $request->latitude > 90) {
            return redirect()->back()->withErrors(['latitude' => 'A latitude deve estar entre -90 e 90.'])->withInput($request->all());
        }
        if (!$this->is_number($request->longitude) || $request->longitude < -180 || $request->longitude > 180) {
            return redirect()->back()->withErrors(['longitude' => 'A longitude deve estar entre -180 e 180.'])->withInput($request->all());
        }

        $instituicao = new Instituicao();
        $instituicao->fill($request->all());
        $instituicao->save();
        $this->salvarImagem($request, $instituicao);


        return redirect(route('instituicao.cadastro', ['id' => $instituicao->id]))->with(['success' => 'Instituição cadastrada com sucesso!']);
    }

    public function delete(Request $request)
    {
        $instituicao = Instituicao::find($request->id);
        $imagem = $instituicao->images()->where('nome', 'logo')->first();
        if ($imagem != null) {
            if (Storage::disk()->exists('public/' . $imagem->path)) {
                Storage::delete('public/' . $imagem->path);
            }
        }
        $instituicao->delete();
        return redirect()->back()->with(['message' => 'Instituição Removida com Sucesso!']);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'estado' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'endereco' => 'nullable|string|max:255',
            'cep' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'site' => 'nullable|string|max:255',
            'coordenador' => 'nullable|string|max:255',
            'datafundacao' => 'nullable|date|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'image' => 'nullable|file',
            'informacao' => 'nullable|max:255',
        ]);

        if (!$this->is_number($request->latitude) || $request->latitude < -90 || $request->latitude > 90) {
            return redirect()->back()->withErrors(['latitude' => 'A latitude deve estar entre -90 e 90.'])->withInput($request->all());
        }
        if (!$this->is_number($request->longitude) || $request->longitude < -180 || $request->longitude > 180) {
            return redirect()->back()->withErrors(['longitude' => 'A longitude deve estar entre -180 e 180.'])->withInput($request->all());
        }

        $instituicao = Instituicao::find($id);
        $instituicao->setAtributes($request);
        $this->salvarImagem($request, $instituicao);
        $instituicao->update();

        return redirect(route('instituicao.edit', ['id' => $instituicao->id]))->with(['success' => 'Instituição atualizada com sucesso!']);
    }

    private function is_number($var)
    {
        if ($var == (string)(float)$var) {
            return (bool)is_numeric($var);
        }
        if ($var >= 0 && is_string($var) && !is_float($var)) {
            return (bool)ctype_digit($var);
        }
        return (bool)is_numeric($var);
    }

    private function salvarImagem(Request $request, Instituicao $instituicao)
    {
        $path = "";
        if ($request->hasFile('image')) {
            $imagem = $instituicao->images()->where('nome', 'logo')->first();
            if ($imagem != null) {
                if (Storage::disk()->exists('public/' . $imagem->path)) {
                    Storage::delete('public/' . $imagem->path);
                }
            }

            $path = $request->file('image')->store(
                'images/' . $instituicao->id, 'public'
            );

            if ($imagem != null) {
                $imagem->path = $path;
                $imagem->update();
            } else {
                $instituicao->images()->create([
                    'path' => $path,
                    'nome' => 'logo',
                ]);
            }
        }
    }
}
