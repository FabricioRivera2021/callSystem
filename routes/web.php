<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NumerosController;
use App\Http\Controllers\UserController;
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

Route::get('/admin', function(){
    return view('admin.dashboard');
});

Route::get('login', fn() => to_route('auth.create'))->name('login'); //redirects to the create page
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::get('online-user', [UserController::class, 'index']);

Route::resource('numeros', NumerosController::class)
    ->only(['create', 'store']);

Route::middleware('auth')->group(function (){
    Route::resource('numeros', NumerosController::class)
        ->only(['index']);
});
