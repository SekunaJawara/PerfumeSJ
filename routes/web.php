<?php

use App\Models\Perfume;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfumeController;


//Todos los perfumes
Route::get('/', [PerfumeController::class, 'index']);

Route::get('/perfumes/vue', function(){
    return view('perfumes.vue');
});


//Mostrar el formulario que crea un perfume
Route::get('/perfumes/create', [PerfumeController::class, 'create'])->middleware('auth');

//Almacenar perfume
Route::post('/perfumes', [PerfumeController::class, 'store'])->middleware('auth');

//Editar pefume 
Route::get('/perfumes/{perfume}/edit',[PerfumeController::class, 'edit'])->middleware('auth');

// Actualiza el perfume
Route::put('/perfumes/{perfume}',[PerfumeController::class,'update'])->middleware('auth');

// Borrar perfume
Route::delete('/perfumes/{perfume}',[PerfumeController::class,'destroy'])->middleware('auth');

//Gestionar tus opiniones
Route::get('/perfumes/manage',[PerfumeController::class, 'manage'])->middleware('auth');

//Un perfume
Route::get('/perfumes/{perfume}', [PerfumeController::class, 'show'])->name('perfumes.show');

//Muestra el formulario de creacion de usuario
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//Crea un nuevo usuario
Route::post('/users',[UserController::class,'store']);

//Cerrar sesión
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');


//Mostrar formulario inicio de sesión
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

//Iniciar sesión
Route::post('users/authenticate',[UserController::class,'authenticate']);

