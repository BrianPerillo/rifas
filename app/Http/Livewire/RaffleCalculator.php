<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use App\Models\Jackpot;

class RaffleCalculator extends Component
{

    public $quantity = 1;
    public $final_price;

    public function render(){
        
        //Consulto el pozo total
        $jackpot = Jackpot::get()->first();

        $jackpot_value = $jackpot->value;

        //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        $raffles_price = $jackpot_value*0.01;
        
        //Calculo precio por el total de las rifas solicitadas 

        if(is_numeric($this->quantity)){
            $this->final_price = $this->quantity*$raffles_price;
        }
        else{
            $this->final_price = null;
        }

        return view('livewire.raffle-calculator', ['final_price']);

    }
}
