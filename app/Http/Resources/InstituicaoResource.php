<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstituicaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "nome" => $this->nome,
            "categoria" => $this->categoria,
            "pais" => $this->pais,
            "estado" => $this->estado,
            "cidade" => $this->cidade,
            "endereco" => $this->endereco,
            "cep" => $this->cep,
            "telefone" => $this->telefone,
            "site" => $this->site,
            "info" => $this->info,
            "email" => $this->email,
            "coordenador" => $this->coordenador,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "confirmacaoEmail" => $this->confirmacaoEmail,
            "datafundacao" => $this->datafundacao,
            "created_at"=> $this->created_at,
            "images"=> $this->images
        ];
    }
}
