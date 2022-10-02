<style>
    .divLabel {
        font-weight: bold;
        font-size: 15px;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Instituições') }}
                </h2>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-secondary" href="{{route('instituicao.cadastro')}}" style="float: right; margin-right: 10%">Cadastrar Instituição</a>
            </div>
        </div>
    </x-slot>

    <div class="container" style="margin-top:3rem; padding-bottom:9rem;">
        @if (session('message'))
            <div class="bg-green-100 rounded-md border-2 border-green-500 text-green-700 px-4 py-3 mb-4" role="alert">
                <p class="font-bold">{{ session('message') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 rounded-md border-2 border-red-500 text-red-700 px-4 py-3 mb-4" role="alert">
                <p class="font-bold">{{ session('error') }}</p>
            </div>
        @endif
        <div class="row justify-center">
            <div class="col-md-12" style="text-align: right; margin-bottom:1rem">
                <a href="{{ route('instituicao.aprovados') }}" class="btn btn-primary">Listar aprovados</a>
                <a href="{{ route('instituicao.pendentes') }}" class="btn btn-warning">Listar pendentes</a>
                <a href="{{ route('instituicao.reprovados') }}" class="btn btn-danger">Listar reprovados</a>
            </div>
            @forelse ($instituicaos as $instituicao)
                <div class="col-md-12 shadow"
                     style="background-color: #fff; border-radius:12px; margin-bottom:15px; margin-left:15px; margin-right:15px">
                    <div class="row">
                        <div class="col-md-5" style="margin: 10px; margin-top:20px; margin-bottom:20px">
                            @if( $instituicao->images->count() != 0 )
                                <img class="object-contain w-full h-full"
                                     src="{{ asset('storage/'.$instituicao->images->first()->path) }}"
                                     alt="Sunset in the mountains">
                            @else
                                <img class="object-contain w-full h-full" src="{{ asset('images/modelo.png') }}"
                                     alt="Sem imagem">
                            @endif
                        </div>
                        <div class="col" style="margin: 10px; margin-top:15px">
                            <div class="row">
                                <div class="col-md-9"
                                     style="font-size: 25px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-bottom:15px">
                                    {{  $instituicao->nome }}
                                </div>
                                @php
                                    $checkPais = \App\Countries::getIsoPt($instituicao->pais);
                                    $checkCategoria = null;
                                    if($instituicao->categoria=='Instituto Paulo Freire' || $instituicao->categoria=='Cátedra Paulo Freire'
                                    || $instituicao->categoria=='Centro Paulo Freire' || $instituicao->categoria=='Grupo/Coletivo Paulo Freire'
                                    || $instituicao->categoria=='Homenagem'  ){
                                        $checkCategoria = 1;
                                    }
                                @endphp
                                <div id="div-atencao-instituicao" class="col-md-1" style="margin-top: 4px; padding-right: 0;">
                                    @if($checkPais==null || $checkCategoria==null)
                                        <img src="{{asset('images/atencao.png')}}" style="width: 70%" title="Atualize as informações da insituição"/>
                                    @endif
                                </div>
                                <div id="div-delete-instituicao" class="col-md-1" style="margin-right: -3%; margin-top: 4px">
                                    <a href="{{route('instituicao.delete', ['id' => $instituicao->id])}}" onclick="return confirm('Tem certeza que deseja remover a instituição?')">
                                        <img src="https://img.icons8.com/material-outlined/24/000000/trash--v1.png"/>
                                    </a>
                                </div>
                                <div id="div-edit-instituicao" class="col-md-1">
                                    <a href="{{route('instituicao.edit', ['id' => $instituicao->id])}}">
                                        <img src="{{asset('images/edit-regular.svg')}}" alt="Editar Instituição"
                                             width="25px" height="auto" style="float: right; margin-top: 5px;"
                                             onmouseover="this.src='{{asset('images/edit-regular-cinza.svg')}}'"
                                             onmouseout="this.src='{{asset('images/edit-regular.svg')}}'">
                                    </a>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Categoria:
                                                </div>
                                                <div style="font-size:17px">{{ $instituicao->categoria }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    País:
                                                </div>
                                                <div style="font-size:17px">{{ $instituicao->pais }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Cidade/Estado:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->cidade != null)
                                                        {{ $instituicao->cidade }} /
                                                    @else
                                                        Não identificado /
                                                    @endif
                                                    @if($instituicao->estado != null){{ $instituicao->estado }}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Endereço:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->endereco != null)
                                                        {{ $instituicao->endereco }}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    CEP:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->cep != null)
                                                        {{ $instituicao->cep }}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Telefone:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->telefone != null)
                                                        {{ $instituicao->telefone }}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Coordenador:
                                                </div>
                                                <div style="font-size:17px">@if($instituicao->coordenador != null)
                                                        {{ $instituicao->coordenador }}
                                                    @else
                                                        Não identificado
                                                    @endif</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Data de fundação:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->datafundacao != null)
                                                        {{ date("d/m/Y", strtotime($instituicao->datafundacao))}}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px; word-break: break-all;" >
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    E-mail/Site:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->email != null)
                                                        {{ $instituicao->email }} /
                                                    @else
                                                        Não identificado /
                                                    @endif
                                                    @if($instituicao->site != null)
                                                        <a href="{{$instituicao->site}}">{{ $instituicao->site }}</a>
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div class="divLabel">
                                                    Informação:
                                                </div>
                                                <div style="font-size:17px">
                                                    @if($instituicao->info != null)
                                                        {{ $instituicao->info }}
                                                    @else
                                                        Não identificado
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: right; margin-bottom:15px">
                                    @if( is_null($instituicao->autorizado))
                                        <a href="{{ route('instituicao.aceitar', ['id' => $instituicao->id]) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full mr-8 mb-4">
                                            Aprovar
                                        </a>
                                        <a href="{{ route('instituicao.reprovar', ['id' => $instituicao->id]) }}"
                                           onclick="return confirm('Tem certeza?')"
                                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full mr-8">
                                            Reprovar
                                        </a>

                                    @elseif($instituicao->autorizado == true)
                                        <div class="bg-green-500 text-center font-bold py-2 px-6 rounded-full ">
                                            <a href="{{ route('instituicao.reprovar', ['id' => $instituicao->id]) }}"
                                               onclick="return confirm('Tem certeza?')" class="text-white">
                                                Autorizado
                                            </a>
                                        </div>

                                    @elseif($instituicao->autorizado == false)
                                        <div class="bg-red-500 text-center font-bold py-2 px-6 rounded-full ">
                                            <a href="{{ route('instituicao.aceitar', ['id' => $instituicao->id]) }}"
                                               onclick="return confirm('Tem certeza?')" class="text-white">
                                                Reprovado
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="bg-yellow-100 rounded-md border-2 text-center border-yellow-500 text-yellow-700 px-4 py-3 mb-4"
                    role="alert">
                    <p class="font-bold">Não há instituições</p>
                </div>

            @endforelse
        </div>
    </div>

</x-app-layout>
