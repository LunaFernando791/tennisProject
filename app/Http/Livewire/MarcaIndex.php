<?php

namespace App\Http\Livewire;
use App\Models\Marca;
use Livewire\Component;

use Livewire\WithPagination;
class MarcaIndex extends Component
{
    public $search;
    public function updatingSearch(){
        $this->resetPage(); //Restablece la info de la página.
    }
    public function render()
    {
        $marcas=Marca::where('name', 'LIKE', '%'. $this->search .'%')
        ->paginate(10)->onEachSide(1);
        return view('livewire.marca-index', compact('marcas'));
    }
}
