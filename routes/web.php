<?php
use App\Http\Controllers\CalzadoController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MarcaController;
use App\Models\Marca;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



Route::get('/', function () {
    $marcas=Marca::all();
    return view('home')->with('marcas', $marcas);
})->name('home'); //Ruta para la página principal

Route::resource('users', UserController::class)->names('admin.users')->middleware('admin'); //Ruta para administración de usuarios.
Route::resource('marcas', MarcaController::class)->names('admin.marcas')->middleware('admin');
Route::resource('tennis', CalzadoController::class)->parameters([
    'tennis'=>'calzado'
]); //Ruta para vista de calzados.

Route::get('tennis/marca/{marca}', [CalzadoController::class, 'marca'])->name('tennis.marca'); //Ruta para la consulta de calzado por marcas.

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/login-google', function () {   //Rutas hacia el inicio y registro de sesión con credenciales de google.
    return Socialite::driver('google')->redirect();
});
Route::get('/google-callback', function () {  //Crea el usuario o inicia sesión si ya existe.
    $user = Socialite::driver('google')->user();
    $userExists =User::where('external_id', $user->getId())->where('external_auth', 'google')->first();
    if($userExists){
        Auth::login($userExists);
    }else{
        $userNew = User::create([
            'name'=>$user->getName(),
            'email'=>$user->getEmail(),
            'avatar'=>$user->getAvatar(),
            'external_id'=>$user->getId(),
            'external_auth'=>'google',
        ]);
        Auth::login($userNew);
    }
    return redirect('/');
});
