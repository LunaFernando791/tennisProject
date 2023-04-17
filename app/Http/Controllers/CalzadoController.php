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
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
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
            'marcca'=>['requier', 'string', 'max:100'],
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
        ]);

        $tennis = new Calzado();
        $tennis->marca = $request->marca;
        $tennis->modelo = $request->modelo;
        $tennis->precio = $request->precio;
        $tennis->detalle = $request->detalle;
        $tennis->save();

        return redirect('/tennis');
    }

    /**
     * Display the specified resource.
     */
    public function show(Calzado $calzado)
    {
        return view('tennis/show-tennis', compact('calzado')); //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calzado $calzado) //se trata de mostrar un formulario que ya tengo en la base de datos y la quiero modificar, tenemos que ver las rutas y como estan armadas
    {
        return view('tennis/edit-Tennis', compact('calzado'));//en los inputs se podemos agergar un value, en el value le ponemos la inforacion que estamos recuperando del elemento que estamos editando.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calzado $calzado)
    {
        $request->validate([
            'marcca'=>['requier', 'string', 'max:100'],
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
        ]);
        $calzado->marca=$request->marca;
        $calzado->modelo=$request->modelo;
        $calzado->precio=$request->precio;
        $calzado->detalle=$request->detalle;
        $calzado->save();
        return redirect()->route('tennis.show', $calzado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calzado $calzado)
    {
        $calzado->delete();
        return redirect()->route('tennis.index');
    }
}
