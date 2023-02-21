<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CalzadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tennis = Calzado::all();
        return view('tennis.indexTennis', compact('tennis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tennis.createTennis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo'=>['required', 'string', 'max:255'],
            'precio'=>['required'],
        ]);

        $tennis = new Calzado();
        $tennis->modelo = $request->modelo;
        $tennis->precio = $request->precio;
        $tennis->save();

        return redirect('/tennis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calzado $calzado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calzado $calzado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calzado $calzado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calzado $calzado)
    {
        //
    }
}
