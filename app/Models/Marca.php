<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    public function calzados(){
        return $this->hasMany(Calzado::class); //Relacion uno a muchos.
    }
}
