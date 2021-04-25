<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Role extends Model
{
    use HasFactory;

    //Relación 1:N - Acceder a los Usuarios que tengan cierto Rol:
    public function users(){                
        return $this->hasMany(User::class); //Un rol puede pertenecer a muchos Users
    }

}
