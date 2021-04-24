<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use App\Models\Jackpot;

class RafflesInfo extends Component
{

    public $jackpot_value;
    public $result;
    public $raffles_price;

    public function render(){
                
        //Consulto el pozo total
        $jackpot = Jackpot::get()->first();

        $this->jackpot_value = $jackpot->value;

        //Consulto Valor Dólar
        $consulta_principal = Http::get("https://www.dolarsi.com/api/api.php?type=valoresprincipales");

        $this->result = $consulta_principal[0];

        //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        $this->raffles_price =  $jackpot->value*0.01;
                            
        //$banco_central = Http::withToken('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTA2Njc3NjgsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJicmlhbmVwZXJpbGxvQGdtYWlsLmNvbSJ9.zEIxqkFOJAXtg5nahoY0xxhiPpzH8B0V9vB-dXQjjDLqHeZZmPpSB2dmFLy6P6pj1hEHT9hod7gK-VOUikc1rg')->get('https://api.estadisticasbcra.com/usd_of');

        return view('livewire.raffles-info', ['result', 'jackpot_value', 'raffles_price']);

    }

}
