<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Calzado extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    public function getModeloAttribute($value)
    {
        //Usa un accessors para presentar el nombre del modelo en mayúsculas.
        return strtoupper($value);
    }
    public function setPrecioAttribute($value) //Mutator para validar el rango de precio del calzado.
    {
        //Aplica validación del rango
        $validacionPrecio=max(0, min(100000, $value));
        $this->attributes['precio']=$validacionPrecio;
    }
}
