<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Envia los usuarios a la vista del administrador.
    {
        $users=User::all();
        return view('admin.users.indexUsers', compact('users'));
    }
    public function edit(User $user) //Retorna la vista para editar el rol del usuario.
    {
        $roles=Role::all();
        return view('admin.users.editUser', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)  //Actualiza el estatus del usuario, de cliente administrador
    {
        $user->roles()->sync($request->role_id);
        return redirect()->route('admin.users.edit', $user)->with('rolAsignado', 'ok');
    }
    public function mostrarFavoritos()  //Muestra los productos favoritosdel usuario.
    {
        $user = auth()->user();
        $favoritos = $user->favoritos()->get();
        return view('partials.favoritos', compact('favoritos'));
    }

}
