<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instituições') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-100 rounded-md border-2 border-green-500 text-green-700 px-4 py-3 mb-4" role="alert">
                    <p class="font-bold">{{ session('message') }}</p>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:px-4 py-8 w-full">
                    <div class=" grid grid-cols-1  w-full">
                        @forelse ($instituicaos as $instituicao)
                            <div>
                                <div class="max-w-full mx-auto rounded overflow-hidden shadow-lg my-2">
                                    <div class="grid grid-cols-4 gap-2 justify-items-center">
                                        <div>
                                            <img class="object-contain w-full h-full" src="{{ asset($instituicao->images->first()->path) }}" alt="Sunset in the mountains">
                                        </div>
                                        <div class="col-span-3 pt-5">
                                            <div class="px-6 py-2">
                                                <div class="font-bold text-xl mb-2">Nome: {{  $instituicao->nome }}</div>
                                                <div class="grid grid-cols-3 gap-4">
                                                    <div>
                                                        <p> <span class="font-bold" >categoria:</span>  {{ $instituicao->categoria }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >pais:</span>  {{ $instituicao->pais }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >estado:</span>  {{ $instituicao->estado }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" > cidade:</span> {{ $instituicao->cidade }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >endereco:</span>  {{ $instituicao->endereco }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >cep:</span>  {{ $instituicao->cep }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >telefone:</span>  {{ $instituicao->telefone }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >coordenador:</span>  {{ $instituicao->coordenador }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >datafundacao:</span>  {{ $instituicao->datafundacao }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >NomedaRealizacao:</span>  {{ $instituicao->NomedaRealizacao }}</p>
                                                    </div>
                                                    <div>
                                                        <p> <span class="font-bold" >info:</span>  {{ $instituicao->info }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-6 py-6">
                                                @if($instituicao->autorizado)
                                                    <div class="bg-green-500 text-center font-bold py-2 px-6 rounded-full">
                                                        Autorizado
                                                    </div>
                                                @else
                                                    <a href="{{ route('instituicao.aceitar', ['id' => $instituicao->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full mr-8 mb-4">
                                                        Aprovar
                                                    </a>
                                                    {{-- <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full mr-8">
                                                        Reprovar
                                                    </a> --}}
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
            </div>
        </div>
    </div>
</x-app-layout>
