<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'path'];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaos_id');
    }
}
