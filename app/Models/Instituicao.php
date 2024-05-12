<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Panoscape\History\HasHistories;

class Instituicao extends Model
{
    use HasFactory, SoftDeletes, Notifiable, HasHistories;

    protected $fillable = ['nome', 'categoria', 'pais', 'estado', 'cidade', 'endereco', 'cep', 'telefone', 'email', 'site', 'coordenador', 'latitude', 'longitude', 'info', 'datafundacao'];

    public function images()
    {
        return $this->hasMany(Image::class, 'instituicaos_id');
    }

    public function getModelLabel()
    {
        return $this->nome;
    }

    public function setAtributes($request)
    {
        $this->nome = $request->nome;
        $this->categoria = $request->categoria;
        $this->pais = $request->pais;
        $this->estado = $request->estado;
        $this->cidade = $request->cidade;
        $this->endereco = $request->input('endereço');
        $this->cep = $request->cep;
        $this->telefone = $request->telefone;
        $this->email = $request->email;
        $this->site = $request->site;
        $this->coordenador = $request->coordenador;
        $this->datafundacao = $request->input('data_de_fundação');
        $this->latitude = $request->latitude;
        $this->longitude = $request->longitude;
        $this->info = $request->input('informação');
    }
}
