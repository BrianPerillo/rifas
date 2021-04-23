<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="">
                <p>
                    @if ($result)
                        
                        @foreach ($result as $dato)
                            @if ($dato["nombre"] == "Dolar Oficial")
                                @php $dato = $dato["venta"] @endphp
                                {{"Cotización del Dólar Oficial para la venta: " . $dato}} - {{"(Sacado de Api DolarSi)"}}
                            @endif
                        @endforeach

                    @endif
                </p>

                {{"Valor del Pozo Actual: " . $jackpot_value}} - {{"Traido de la DB"}}
        
                <!-- Form para prueba --> <!-- Form para prueba --> <!-- Form para prueba --> <!-- Form para prueba --> 
        
                <div class="d-flex justify-content-center"  style="margin:auto;">
        
                    <form action="{{route('raffles.buy')}}" method="POST" style="width:40%">
                    
                        @csrf

                        <div class="col" style="padding: 0px; box-sizing: border-box">
                            <p>Comprar Rifas</p>
                
                            <div class="form-group">
                
                                <div class="col mb-5 ml-1 mr-1" style="text-align: center">
                                    <input class="form-control" name="raffles" type="number" min="1" value="" placeholder="1">
                                </div>
                
                            </div>
    
                            <input type="number" value="" hidden>
                
                            <div class="form-group">
                                <div class="col mb-5 mr-1" style="text-align: center">
                                    <button class="btn btn-primary float-right">Enviar</button>
                                </div>
                            </div>
                        
                        </div>
                
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

        