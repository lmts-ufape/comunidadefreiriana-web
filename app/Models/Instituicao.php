<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instituicao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'categoria', 'pais', 'estado', 'cidade', 'endereco', 'cep', 'telefone', 'email', 'site', 'coordenador', 'DatadeRealizacao', 'NomedaRealizacao', 'latitude', 'longitude', 'info', 'autorizado', 'confirmacaoEmail', 'datafundacao'];

    public function images()
    {
        return $this->hasMany(Image::class, 'instituicaos_id');
    }

}
