<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Jackpot;

class MainController extends Controller
{

    function show() {

        $jackpot = Jackpot::get()->first();

        $jackpot_value = $jackpot->value;

        $consulta_principal = Http::get("https://www.dolarsi.com/api/api.php?type=valoresprincipales");

        $result = $consulta_principal[0];

        //$banco_central = Http::withToken('eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2NTA2Njc3NjgsInR5cGUiOiJleHRlcm5hbCIsInVzZXIiOiJicmlhbmVwZXJpbGxvQGdtYWlsLmNvbSJ9.zEIxqkFOJAXtg5nahoY0xxhiPpzH8B0V9vB-dXQjjDLqHeZZmPpSB2dmFLy6P6pj1hEHT9hod7gK-VOUikc1rg')->get('https://api.estadisticasbcra.com/usd_of');

        return view('home')->with(compact('result', 'jackpot_value'));
    }

}
