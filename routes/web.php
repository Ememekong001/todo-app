<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//auth
Route::get('/',[AuthController::class, 'index'])->name('register');
Route::post('/registerUser', [AuthController::class, 'registerUser'])->name('registerUser');
Route::get('/login',[AuthController::class, 'loginShow'])->name('login');
Route::post('/login',[AuthController::class, 'loginUser'])->name('loginUser');
Route::get('/logout',[AuthController::class, 'logoutUser'])->name('logout');


//Todo
Route::get('/dashboard', [TodoController::class, 'index'])->middleware(['auth',])->name('dashboard');
Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::put('/edit/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');




