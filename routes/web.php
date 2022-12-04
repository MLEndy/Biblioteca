<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\UserController;
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

/*------------------------- CONTROL USUARIO -------------------------------*/
Route::get('/', [UserController::class, 'LoginIndex'])->middleware('guest');
Route::get('/register', [UserController::class, 'RegisterIndex'])->middleware('guest');
Route::post('/login', [UserController::class, 'LoginUser'])->middleware('guest');
Route::post('/register', [UserController::class, 'RegisterUser'])->middleware('guest');
Route::post('/logout', [UserController::class, 'LogoutUser'])->middleware('auth');

/*------------------------- CONTROL LIBROS -------------------------------*/
Route::get('/search', [LibrosController::class, 'SearchIndex'])->middleware('auth');

/*------------------------- CONTROL ADMIN -------------------------------*/
Route::get('/test', [AdminController::class, 'TestProfile']);
Route::post('/saveTest', [AdminController::class, 'TestStorage']);
Route::get('/getToken', [AdminController::class, 'getToken']);
Route::get('/godView/users', [AdminController::class, 'AdminUsers']);
Route::get('/godView/books', [AdminController::class, 'AdminBooks']);
