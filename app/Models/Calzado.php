<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Calzado extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function marca(){  //Relacion uno a muchos
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
    public function favoritedBy() //Relacion muchos a muchos
    {
        return $this->belongsToMany(User::class, 'favorite_calzado_user', 'calzado_id', 'user_id')->withTimestamps();
    }

    public function isFavorite()
    {
        if (auth()->check()) {
            // Obtener el usuario autenticado
            $user = auth()->user();
            // Verificar si el producto está en la lista de favoritos del usuario
            return $user->favoritos()->where('calzado_id', $this->id)->exists();
        }
    }
}
