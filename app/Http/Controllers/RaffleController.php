<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaffleController extends Controller
{
    function create() {

        return redirect()->route('dashboard');

    }
}
