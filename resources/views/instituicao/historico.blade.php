<!--Importando Script Jquery-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<style>
    strong{
        color: red;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Histórico de alterações da instituição', ['instituicao' => $instituicao->nome]) }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="justify-content-center">
            <div class="">
                <div class="card mt-14">
                    <div class="card-header">
                        Instituições > Histórico de alterações da instituição
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Histórico de alterações da instituição</h5>
                        @if(session('success'))
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 5px;">
                                    <div class="alert alert-success" role="alert">
                                        <p>{{session('success')}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session('danger'))
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 5px;">
                                    <div class="alert alert-danger" role="alert">
                                        <p>{{session('danger')}}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Atributo</th>
                                    <th scope="col">Valor antigo</th>
                                    <th scope="col">Novo Valor</th>
                                    <th scope="col">Usuário</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                    @isset($history->meta)
                                    @foreach ($history->meta as $meta)
                                        <tr>
                                            @if ($loop->first)
                                                <td class="align-middle" rowspan="{{ count($history->meta) }}">{{ $history->performed_at->format('d/m/Y H:i:s') }}</td>
                                            @endif
                                            <td class="align-middle">{{ $meta['key'] }}</td>
                                            <td class="align-middle">{{ $meta['old'] }}</td>
                                            <td class="align-middle">{{ $meta['new'] }}</td>
                                            @if ($loop->first)
                                                <td class="align-middle" rowspan="{{ count($history->meta) }}">{{ $history->user->name }}</td>
                                                <td class="align-middle" rowspan="{{ count($history->meta) }}" style="min-width: 25px;">
                                                    <form class="mb-0" action="{{ route('instituicao.historico.restaurar', ['instituicao' => $instituicao->id, 'history' => $history->id]) }}" method="post">
                                                        @csrf
                                                        <button type="submit" title="Desfazer alterações">
                                                            <img width="25px" src="{{ asset('images/icons8-restore-32.png') }}" alt="Desfazer alterações">
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    @endisset
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
