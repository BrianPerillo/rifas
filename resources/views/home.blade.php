<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">

        <div class="container">

            @if (isset($user_role))

                <p>Tipo de Usuario: {{"$user_role"}}</p>
                
                <p>Lista de Compradores:

                    @foreach ($compradores as $comprador)
                        {{$comprador->name . ", " }}
                    @endforeach

                </p>

            @endif

            </br>

            <div>
                <livewire:raffles-info/>
            </div>

            <div style="width:30%;margin:auto">

                <livewire:raffle-calculator />

            </div>

        </div>

    </div>

</x-app-layout>

        