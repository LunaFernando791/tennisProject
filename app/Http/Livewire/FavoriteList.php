<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteList extends Component
{
    protected $listeners = ['favoritoActualizado' => 'actualizarFavoritos']; //Escucha de eventos para actualizar
                                                                            //la lista de favoritos en tiempo real.
    public function actualizarFavoritos()
    {
        $this->render();
    }
    public function render() //Muestra en una vista parcial la lista de favoritos del usuario.
    {
        if(auth()->check()){
            $user = auth()->user();
            $favoritos = $user->favoritos()->get();
            return view('livewire.favorite-list', compact('favoritos'));
        }
        return view('livewire.favorite-list');
    }
}

