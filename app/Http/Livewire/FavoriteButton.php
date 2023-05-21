<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FavoriteButton extends Component
{
    public $isFavorite = false;
    public $calzadoId;
    public function render()
    {
        return view('livewire.favorite-button');
    }
    public function mount($calzadoId)
    {
        $this->calzadoId = $calzadoId;
    }
    public function toggleFavorite()  //Elimina o agrega algun calzado como favorito en la tabla pivote.
    {
        if(auth()->check()){
            if($this->isFavorite){
                auth()->user()->favoritos()->detach($this->calzadoId);
            }else{
                auth()->user()->favoritos()->attach($this->calzadoId);
            }
            $this->emit('favoritoActualizado');
            $this->isFavorite = !$this->isFavorite;
        }
    }
}
