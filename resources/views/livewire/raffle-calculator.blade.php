<div>

    <div class="col" style="padding: 0px; box-sizing: border-box">
        <p>Elegí la cantidad de Rifas que querés comprar</p>

        <div class="form-group">

            <div class="col mb-5 ml-1 mr-1" style="text-align: center">
                <input wire:model="quantity" class="form-control" name="raffles_quantity" type="number" min="1" value="1" placeholder="">
            </div>

        </div>
{{-- 
        <div class="form-group">
            <div class="col mb-5 mr-1" style="text-align: center">
                <button wire:click="calculate_price({{$quantity}})" class="btn btn-primary float-right">Enviar</button>
            </div>
        </div> --}}

        <p>
            @if(is_numeric($quantity))
                    Precio por {{$quantity}} rifas: {{$final_price}}
            @else 
                Precio por 0 rifas: 0
            @endif

        </p>
        
    
    </div>
    
</div>
