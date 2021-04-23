<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Jackpot;

class RaffleController extends Controller
{
    function show(Request $request) {

        //Consulto el pozo total
        $jackpot = Jackpot::get()->first();

        $jackpot_value = $jackpot->value;

        //Consulto Valor Dólar
        $consulta_principal = Http::get("https://www.dolarsi.com/api/api.php?type=valoresprincipales");

        $result = $consulta_principal[0];

        //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        $raffles_price =  $jackpot->value*0.01;
        
        //Calculo precio por el total de las rifas solicitadas 
        $raffles_quantity = $request->raffles_quantity;

        $total_price = $raffles_price*$raffles_quantity;

        return view('home')->with(compact('result', 'jackpot_value', 'raffles_price', 'total_price'));

    }
}
