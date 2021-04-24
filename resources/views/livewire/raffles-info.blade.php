<div>
    
    <div class=""> 
        
        @if (isset($result))
        <p>
            @foreach ($result as $dato)
                @if ($dato["nombre"] == "Dolar Oficial")
                    @php $dato = $dato["venta"] @endphp
                    {{"Cotización del Dólar Oficial para la venta: " . $dato}} - {{"(Sacado de Api DolarSi)"}}
                @endif
            @endforeach
        </p>

        {{"Valor del Pozo Actual: " . $jackpot_value}} - {{"Traido de la DB"}}
        <p>Precio de las rifas: {{$raffles_price}}</p>
        <!-- Form para prueba --> <!-- Form para prueba --> <!-- Form para prueba --> <!-- Form para prueba --> 

        @endif
        
    </div>

</div>
