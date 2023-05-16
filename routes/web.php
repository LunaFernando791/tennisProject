<?php

use App\Http\Controllers\CalzadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MarcaController;
use App\Models\Marca;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    $marcas=Marca::all();
    return view('home')->with('marcas', $marcas);
})->name('home'); //Ruta para la página principal
Route::resource('users', UserController::class)->names('admin.users')->middleware('admin'); //Ruta para administración de usuarios.
Route::resource('marcas', MarcaController::class)->names('admin.marcas')->middleware('admin');
Route::resource('tennis', CalzadoController::class)->parameters([
    'tennis'=>'calzado'
]); //Ruta para vista de calzados.

Route::get('tennis/marca/{marca}', [CalzadoController::class, 'marca'])->name('tennis.marca');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
