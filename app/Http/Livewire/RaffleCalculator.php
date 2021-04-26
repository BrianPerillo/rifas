<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use App\Models\Draw;
use App\Models\Raffle;

class RaffleCalculator extends Component
{

    public $quantity = 1;
    public $final_price;
    public $message = null;
    public $selected_raffle;
    public $check_availability;
    public $available_raffles = [];

    public function add_raffle(){

        $this->check_availability = [];
        $this->disponible = [];
        $this->message = null;

        //Rifa Ingresada
        $selected_raffle = $this->selected_raffle;

        //En el caso de que el número de rifa no sea válido (menor a 1) devuelvo mensaje de error
        if($selected_raffle<1){
            $this->message = "Debe ingresar un número válido";
        }
        //En caso que el número sea válido sigo con el procedimiento: 
        else{

            //Checkeo si la rifa se encuentra disponible:
            $check_availability = Raffle::where('number', '=', "$selected_raffle")->get();
        
            //En caso de que no esté disponible:
            if(sizeof($check_availability) > 0){
    
                $this->message = "Este número de rifa no está disponible";
    
            }
            //En caso de que sí esté disponible: 
            else{
                
                $this->available_raffles[] = "$selected_raffle";
    
            }
        }

    }

    public function remove_raffle(){

        if(sizeof($this->available_raffles)>0){

            $last_raffle_index = count($this->available_raffles) - 1;
            unset($this->available_raffles[$last_raffle_index]);
            
            $this->message = "Rifa removida";
        }
        else{
            $this->message = "No hay rifas para quitar" ;
        }

    }

    public function render(){
        
        //Consulto el pozo total
        $draw = Draw::get()->first();

        $jackpot_value = $draw->jackpot_value;

        //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        $raffles_price = $jackpot_value*0.01;
        
        //Calculo precio por el total de las rifas solicitadas 

        if(is_numeric($this->quantity)){
            $this->final_price = round(($this->quantity*$raffles_price), 2);
        }
        else{
            $this->final_price = null;
        }

        return view('livewire.raffle-calculator', ['final_price',  "message", "disponible"]);

    }
}
