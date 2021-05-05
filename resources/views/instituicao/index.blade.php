<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instituições') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top:3rem; padding-bottom:9rem;">
        <div class="row justify-center">
            <div class="col-md-12" style="text-align: right; margin-bottom:1rem">
                <button type="button" class="btn btn-warning">Pendente</button>
                <button type="button" class="btn btn-primary">Aprovado</button>
            </div>
            @forelse ($instituicaos as $instituicao)
                <div class="col-md-12 shadow" style="background-color: #fff; border-radius:12px; margin-bottom:15px; margin-left:15px; margin-right:15px">
                    <div class="row">
                        <div class="col-md-5" style="margin: 10px; margin-top:20px; margin-bottom:20px">
                            @if( $instituicao->images->count() != 0 )
                                <img class="object-contain w-full h-full" src="{{ asset($instituicao->images->first()->path) }}" alt="Sunset in the mountains">
                            @else
                                <img class="object-contain w-full h-full" src="{{ asset('images/modelo.png') }}" alt="Sem imagem">
                            @endif
                        </div>
                        <div class="col" style="margin: 10px; margin-top:15px">
                            <div class="row">
                                <div class="col-md-12" style="font-size: 25px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-bottom:15px">{{  $instituicao->nome }}</div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Categoria:</div>
                                                <div style="font-size:17px">{{ $instituicao->categoria }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Pais:</div>
                                                <div style="font-size:17px">{{ $instituicao->pais }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Cidade/Estado:</div>
                                                <div style="font-size:17px">{{ $instituicao->cidade }}/{{ $instituicao->estado }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Endereço:</div>
                                                <div style="font-size:17px">{{ $instituicao->endereco }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">CEP:</div>
                                                <div style="font-size:17px">{{ $instituicao->cep }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Telefone:</div>
                                                <div style="font-size:17px">{{ $instituicao->telefone }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Coordenador:</div>
                                                <div style="font-size:17px">{{ $instituicao->coordenador }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Data de fundação:</div>
                                                <div style="font-size:17px">{{ $instituicao->datafundacao }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Nome da realização:</div>
                                                <div style="font-size:17px">{{ $instituicao->NomedaRealizacao }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:-5px; margin-bottom:-5px">
                                            <div class="form-group">
                                                <div style="font-weight: bold; font-size:15px; margin-bottom:-5px">Informação:</div>
                                                <div style="font-size:17px">{{ $instituicao->info }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align: right; margin-bottom:15px">
                                    @if($instituicao->autorizado)
                                        <div class="bg-green-500 text-center font-bold py-2 px-6 rounded-full">
                                            Autorizado
                                        </div>
                                    @else
                                        <a href="{{ route('instituicao.aceitar', ['id' => $instituicao->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full mr-8 mb-4">
                                            Aprovar
                                        </a>
                                        <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full mr-8">
                                            Reprovar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-yellow-100 rounded-md border-2 text-center border-yellow-500 text-yellow-700 px-4 py-3 mb-4" role="alert">
                    <p class="font-bold">Não há instituições</p>
                </div>

            @endforelse
        </div>
    </div>

</x-app-layout>
