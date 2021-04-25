<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use App\Models\Draw;

class RaffleCalculator extends Component
{

    public $quantity = 1;
    public $final_price;

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

        return view('livewire.raffle-calculator', ['final_price']);

    }
}
