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
    public function index()
    {
        $users=User::all();
        return view('admin.users.indexUsers', compact('users'));
    }
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('admin.users.editUser', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->role_id);
        return redirect()->route('admin.users.edit', $user)->with('rolAsignado', 'ok');
    }
}
