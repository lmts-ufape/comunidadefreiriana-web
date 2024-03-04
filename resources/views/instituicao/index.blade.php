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
            <div class="col-md-6 d-flex justify-content-end">
                <a class="btn btn-secondary" href="{{route('instituicao.cadastro')}}">Cadastrar Instituição</a>
            </div>
        </div>
    </x-slot>

    @livewire('show-instituicoes')

</x-app-layout>
