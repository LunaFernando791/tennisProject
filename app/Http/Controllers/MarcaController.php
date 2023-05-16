<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas=Marca::all();
        return view('admin.marcas.indexMarcas', compact('marcas'));
    }
    public function create()
    {
        return view('admin.marcas.createMarcas');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:100'],
            'imagen' => ['required', 'file'],
        ]);
        $marca=new Marca();
        $marca->name=$request->name;
        if($request->hasFile('imagen')){
            $imagen=$request->file(('imagen'));
            $nombreImagen=time().'_'.$imagen->getClientOriginalName();
            $imagen->storeAs('public', $nombreImagen);
            $marca->imagen=$nombreImagen;
        }
        $marca->save();
        return redirect('/marcas')->with('creado','ok');
    }
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
        //
    }
}
