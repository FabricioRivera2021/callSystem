<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisorController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

//Admin view, custom midelware?
Route::get('/admin', function(){
    return view('admin.dashboard');
});

//handle LOGIN
Route::get('login', fn() => to_route('auth.create'))->name('login'); //redirects to the create page
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

    //hangle LOGOUT
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

//see online users
Route::get('online-user', [UserController::class, 'index']);

//panel numerico - creacion de numeros
Route::resource('numeros', NumerosController::class)
    ->only(['create', 'store']);

//Vista en la television
Route::get('visor', [VisorController::class, 'index']);

//mostrar pagina de agente solo si esta autenticado
Route::middleware('auth')->group(function (){
    Route::resource('numeros', NumerosController::class)
        ->only(['index']);
});
