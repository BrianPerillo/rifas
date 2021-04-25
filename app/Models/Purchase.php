<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Raffle;

class Purchase extends Model
{

    use HasFactory;
    
    //Relación 1:1 - Acceder a la compra de un User:
    public function user(){                
        return $this->belongsTo(User::class); //Una compra va a pertenecer a un solo user
    }

    //Relación 1:N - Acceder a las rifas de una compra
    public function raffles(){                
        return $this->hasMany(Raffle::class); // Una compra puede tener varias rifas.
    }


}
