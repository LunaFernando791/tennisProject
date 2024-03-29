<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Calzado;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
class CalzadoController extends Controller
{
    use SoftDeletes;
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    public function index()
    {
        $tennis = Calzado::all();
        return view('tennis.indexTennis', compact('tennis'));
    }
    public function create(Marca $marcas)
    {
        $marcas=Marca::all();
        return view('tennis.createTennis', compact('marcas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
            'imagen' => ['required', 'file'],
        ]);

        $tennis = new Calzado();
        $tennis->marca_id = $request->marca_id;
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
        $isFavorite=$calzado->isFavorite();
        return view('tennis/show-tennis', compact('calzado', 'rutaImagen', 'isFavorite')); //
    }
    public function edit(Calzado $calzado, Marca $marcas) //se trata de mostrar un formulario que ya tengo en la base de datos y la quiero modificar, tenemos que ver las rutas y como estan armadas
    {
        $marcas=Marca::all();
        return view('tennis/edit-Tennis', compact('calzado', 'marcas'));//en los inputs se podemos agergar un value, en el value le ponemos la inforacion que estamos recuperando del elemento que estamos editando.
    }
    public function update(Request $request, Calzado $calzado)
    {
        $request->validate([
            'modelo'=>['required', 'string', 'max:100'],
            'precio'=>['required'],
            'detalle'=>['required', 'string', 'max:255'],
            'imagen' => ['required', 'file'],
        ]);
        $calzado->marca_id=$request->input('marca_id');
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
    }
    public function getCalzado(){
        $calzado=Calzado::orderBy('modelo', 'asc')->get(); //Se realiza la consulta de manera ordenada a traves del modelo del calzado.
        return response()->json($calzado); //Envía el JSON ordenado.
    }
    public function marca($marca_id) //Filtra la consulta de calzado por marcas.
    {
        $marca = Marca::findOrFail($marca_id);
        $calzados = $marca->calzados()->get();
        return view('tennis.marca', compact('calzados'));
    }
}
