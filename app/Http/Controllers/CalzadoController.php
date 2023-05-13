<?php

namespace App\Http\Controllers;

use App\Models\Calzado;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
    public function create()
    {
        return view('tennis.createTennis');
    }
    public function store(Request $request)
    {
        $request->validate([
            'marcca'=>['requier', 'string', 'max:100'],
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
            'imagen' => ['required', 'file'],
        ]);

        $tennis = new Calzado();
        $tennis->marca = $request->marca;
        $tennis->modelo = $request->modelo;
        $tennis->precio = $request->precio;
        $tennis->detalle = $request->detalle;
        if($request->hasFile('imagen')){
            $imagen=$request->file(('imagen'));
            $nombreImagen=time().'_'.$imagen->getClientOriginalName();
            $imagen->storeAs('public', $nombreImagen);
            $tennis->imagen=$nombreImagen;
        }
        $tennis->save();

        return redirect('/tennis')->with('creado','ok');
    }
    public function show(Calzado $calzado)
    {
        $rutaImagen=$calzado->imagen;
        return view('tennis/show-tennis', compact('calzado', 'rutaImagen')); //
    }
    public function edit(Calzado $calzado) //se trata de mostrar un formulario que ya tengo en la base de datos y la quiero modificar, tenemos que ver las rutas y como estan armadas
    {
        return view('tennis/edit-Tennis', compact('calzado'));//en los inputs se podemos agergar un value, en el value le ponemos la inforacion que estamos recuperando del elemento que estamos editando.
    }
    public function update(Request $request, Calzado $calzado)
    {
        $request->validate([
            'marcca'=>['requier', 'string', 'max:100'],
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
            'imagen' => ['required', 'file'],
        ]);
        $calzado->marca=$request->marca;
        $calzado->modelo=$request->modelo;
        $calzado->precio=$request->precio;
        $calzado->detalle=$request->detalle;
        Storage::delete('public/'.$calzado->imagen);
        if($request->hasFile('imagen')){
            $imagen=$request->file(('imagen'));
            $nombreImagen=time().'_'.$imagen->getClientOriginalName();
            $imagen->storeAs('public', $nombreImagen);
            $calzado->imagen=$nombreImagen;
        }
        $calzado->save();
        return redirect()->route('tennis.show', $calzado)->with('editado', 'ok');
    }
    public function destroy(Calzado $calzado)
    {
        Storage::delete('public/'.$calzado->imagen); //Elimina la imagen del storage.
        $calzado->delete();
        return redirect()->route('tennis.index')->with('eliminar', 'ok'); //retorna las variables de session
    }                                                                               //para mostrar el mensaje de exito.
}
