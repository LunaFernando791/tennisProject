<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;
class UsersIndex extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage(); //Restablece la info de la página.
    }
    public function render()
    {
        $users=User::where('name', 'LIKE','%'. $this->search .'%') //Filtra los resultados de la tabla
        ->orwhere('email', 'LIKE', '%' . $this->search . '%')  //segun lo que se introduxca en el input
        ->paginate(10)->onEachSide(1);
        return view('livewire.admin.users-index', compact('users'));
    }
}
