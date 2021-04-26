<div>

    <div class="col" style="padding: 0px; box-sizing: border-box">
        <p>Elegí la cantidad de Rifas que querés comprar</p>

        <div class="form-group">

            <div class="col mb-5 ml-1 mr-1" style="text-align: center">
                <input wire:model="quantity" class="form-control" name="raffles_quantity" type="number" value="1" min="1" step="1" >
            </div>

        </div>
{{-- 
        <div class="form-group">
            <div class="col mb-5 mr-1" style="text-align: center">
                <button wire:click="calculate_price({{$quantity}})" class="btn btn-primary float-right">Enviar</button>
            </div>
        </div> --}}

        <p>
            @if((int) $quantity == $quantity  && $quantity>0)
                    Precio por {{round($quantity)}} rifas: {{$final_price}}
            @else 
                Debes ingresar un número de rifas válido
            @endif

        </p>

        <p>Elegí los números de Rifas que quieras comprar</p>

        <div style="margin:auto">
                        
            <div class="col-md-12 form-group p-10" style="margin-bottom:70px;background-color:white;border-radius:15px 15px 15px 15px;">

                <p><strong>Ingresá número de Rifa</strong></p>
                    
                <div id="add_raffle" class="" style="">

                    {{-- Input Para agregar rifa --}}
                    <div class="">
                        <input wire:model="selected_raffle"  class="form-control" name="raffle" type="number" value="1" min="1" step="1" >
                    </div>

                    {{-- Mensaje --}}
                    <div id="message" class="mt-1 mb-1" style="text-align:center;height: 30px">
                        @if ($message !== null)
                            <p style="color:red"> 
                                {{$message}} 
                            </p>
                        @endif
                    </div>

                    {{-- Botón Agregar Rifa --}}
                    <div class="">

                        <button wire:click="add_raffle({{$selected_raffle}})" class="btn btn-primary" id="clear">Agregar</button>

                        <button wire:click="remove_raffle" class="btn btn-primary" id="clear">Remover Rifa</button>

                    </div>

                    {{-- Foreach para mostrar las rifas agregadas --}}
                    <div class="mt-3 mb-3">

                        <p>Rifas Agregadas:</p>
                        
                        <div class="" style="min-height: 30px">
                            @if (sizeof($available_raffles)>0)
                                <div class="row">

                                    @foreach ($available_raffles as $raffle)

                                            <div class="col-md-2">
                                                {{$raffle}}
                                            </div>
                                        
                                    @endforeach

                                </div>
                                
                            @else 

                                {{"No hay rifas agregadas todavía"}}

                            @endif
                        </div>
                    </div>

                    {{-- Botón Comprar Rifa --}}
                    <div class="">
                        <button wire:click="" class="btn btn-primary" id="clear">Comprar</button>
                    </div>

                </div>



                

     

            </div>

            
            
        </div>

        <p>Podés comprar rifas usando Mercado pago o registrarte para que te contactemos y acordar otro método de pago!</p>

        <button class="btn btn-primary">MercadoPago</button>

        <button class="btn btn-success">Quero que me Contacten</button>


    
    </div>
    
</div>
