<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Draw;
use App\Models\Role;
use App\Models\User;

class MainController extends Controller
{

    function show() {

        // //Consulto el pozo total
        // $jackpot = Jackpot::get()->first();

        // $jackpot_value = $jackpot->value;

        // //Consulto Valor Dólar
        // $consulta_principal = Http::get("https://www.dolarsi.com/api/api.php?type=valoresprincipales");

        // $result = $consulta_principal[0];

        // //Calculo precio de las rifas (1% del jackpot/pozo acumulado) 
        // $raffles_price =  $jackpot->value*0.01;
        
        // //$banco_central = Http::withToken('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTA2Njc3NjgsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJicmlhbmVwZXJpbGxvQGdtYWlsLmNvbSJ9.zEIxqkFOJAXtg5nahoY0xxhiPpzH8B0V9vB-dXQjjDLqHeZZmPpSB2dmFLy6P6pj1hEHT9hod7gK-VOUikc1rg')->get('https://api.estadisticasbcra.com/usd_of');

        if(auth()->user()){   
        
            $user_id = auth()->user()->id;
            $user = User::where('id', '=', "$user_id")->get()->first();
            $user_role = $user->role->name;
            $rol_compradores = Role::where('id', '=', '3')->get()->first();
            $compradores = $rol_compradores->users;

            return view('home')->with(compact('user_role', 'compradores'));

        }
        else{

            return view('home'); //->with(compact('result', 'jackpot_value', 'raffles_price'))
            
        }

        
    }

}
