<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top:2rem">
        <div class="row justify-center">
            <div class="col-md-5 shadow" style="background-color: #fff; margin:15px; border-radius:12px">
                <div class="row" style="text-align: center;">
                    <div class="col-md-12" style="font-size: 50px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-top:15px">{{ $pendentes }}</div>
                    <div class="col-md-12" style="font-family: Arial, Helvetica, sans-serif; font-size:20px; margin-bottom:20px">Pendentes</div>
                </div>
            </div>
            <div class="col-md-5 shadow" style="background-color: #fff; margin:15px; border-radius:12px">
                <div class="row" style="text-align: center;">
                    <div class="col-md-12" style="font-size: 50px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; margin-top:15px">{{ $aprovados }}</div>
                    <div class="col-md-12" style="font-family: Arial, Helvetica, sans-serif; font-size:20px; margin-bottom:20px">Aprovados</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

