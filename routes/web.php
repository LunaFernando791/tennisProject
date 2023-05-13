<?php

use App\Http\Controllers\CalzadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home'); //Ruta para la página principal
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('tennis', CalzadoController::class)->parameters([
    'tennis'=>'calzado'
]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
