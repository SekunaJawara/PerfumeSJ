<?php

use App\Models\Perfume;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfumeController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CartController;



//Todos los perfumes
Route::get('/', [PerfumeController::class, 'index'])->name('index');



//Mostrar el formulario que crea un perfume
Route::get('/perfumes/create', [PerfumeController::class, 'create'])->middleware('auth');

//Almacenar perfume
Route::post('/perfumes', [PerfumeController::class, 'store'])->middleware('auth');

//Editar pefume 
Route::get('/perfumes/{perfume}/edit', [PerfumeController::class, 'edit'])->middleware('auth');

// Actualiza el perfume
Route::put('/perfumes/{perfume}', [PerfumeController::class, 'update'])->middleware('auth');

// Borrar perfume
Route::delete('/perfumes/{perfume}', [PerfumeController::class, 'destroy'])->middleware('auth');

//Gestionar tus opiniones
Route::get('/perfumes/manage', [PerfumeController::class, 'manage'])->middleware('auth');

//Un perfume
Route::get('/perfumes/{perfume}', [PerfumeController::class, 'show'])->name('perfumes.show');

//Mostrar todos los perfumes
Route::get('/perfumes/all', [PerfumeController::class, 'showAll'])->name('perfumes.all');

//Muestra el formulario de creacion de usuario
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Crea un nuevo usuario
Route::post('/users', [UserController::class, 'store']);

//Cerrar sesión
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Ruta de pago en carrito
Route::get("/stripe", [StripeController::class, "index"])->name("stripe");

//Ruta de pago en carrito
Route::post("/stripe", [StripeController::class, "payment"])->name("stripe.payment");

//Ruta de pago correcto
Route::get("/stripe/success", [StripeController::class, "success"])->name("stripe.success");

// Mostrar el carrito
Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart.index');

// Añadir al carrito
Route::post('/cart', [CartController::class, 'store'])->middleware('auth')->name('cart.store');

// Actualizar cantidad de un item del carrito (AJAX)
Route::patch('/cart/{cartItem}', [CartController::class, 'update'])->middleware('auth')->name('cart.update');


//Mostrar formulario inicio de sesión
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');


//Iniciar sesión
Route::post('users/authenticate', [UserController::class, 'authenticate']);

//Mostrar la tabla de comparacion
Route::get('/perfumes/comparar/{ids}', [PerfumeController::class, 'comparar']);

