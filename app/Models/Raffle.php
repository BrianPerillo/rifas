<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Price;
use App\Models\Purchase;

class Raffle extends Model
{
    use HasFactory;

    //Relación 1:1 - Acceder a la compra a la que pertenece la rifa
    public function purchase(){                
        return $this->belongsTo(Purchase::class); // Una rifa puede pertenecer a una compra.
    }

    //Relación 1:1 - Acceder al precio de la rifa
    public function price(){                
        return $this->hasOne(Price::class); // Una rifa puede tener un solo precio.
    }

}
