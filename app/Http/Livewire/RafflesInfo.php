<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use App\Models\Draw;

class RafflesInfo extends Component
{

    public $jackpot_value;
    public $dollar_value;
    public $raffles_price;

    public function render(){

        //Consulto el pozo total
        $draw = Draw::get()->first();

        $this->jackpot_value = $draw->jackpot_value;

        //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        $this->raffles_price = round($this->jackpot_value*0.01, 2);

        //Consulto Valor Dólar: 
        $this->dollar_value = $draw->dollar;
        
        // //Consulto Valor Dólar
        // $consulta_principal = Http::get("https://www.dolarsi.com/api/api.php?type=valoresprincipales");

        //$banco_central = Http::withToken('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTA2Njc3NjgsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJicmlhbmVwZXJpbGxvQGdtYWlsLmNvbSJ9.zEIxqkFOJAXtg5nahoY0xxhiPpzH8B0V9vB-dXQjjDLqHeZZmPpSB2dmFLy6P6pj1hEHT9hod7gK-VOUikc1rg')->get('https://api.estadisticasbcra.com/usd_of');

        return view('livewire.raffles-info', ['dollar_value', 'jackpot_value', 'raffles_price']);

    }

}
