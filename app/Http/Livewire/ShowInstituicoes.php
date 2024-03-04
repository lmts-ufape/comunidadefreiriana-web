<?php

namespace App\Http\Livewire;

use App\Models\Instituicao;
use Livewire\Component;

class ShowInstituicoes extends Component
{
    public $nome = '';

    public $categorias;

    public $categoria;

    public $pais;

    public $paises;

    public $status;

    public function mount()
    {
        $this->categorias = Instituicao::all()->unique('categoria')->map(fn($value) => $value->categoria)->values()->all();
        $this->paises = Instituicao::all()->unique('pais')->map(fn($value) => $value->pais)->values()->all();
        $this->status = 'todas';
    }

    public function render()
    {
        $query = Instituicao::whereRaw('LOWER(nome) LIKE ?', ['%' . strtolower($this->nome) . '%'])
            ->where('categoria', 'like', '%' . $this->categoria . '%')
            ->where('pais', 'like', '%' . $this->pais . '%');
        if ($this->status != 'todas') {
            $query = $query->where('autorizado', $this->status == 'aprovadas');
        }
        return view('livewire.show-instituicoes', [
            'instituicaos' => $query->get(),
        ]);
    }


}
