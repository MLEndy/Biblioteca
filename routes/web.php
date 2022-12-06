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

Route::post('/api/save', [LibrosController::class, 'ApiSaveBook']); //Guarda libro
Route::post('/api/search', [LibrosController::class, 'ApiSearchBook']);//Busca libro
ROute::get('/api/get', [LibrosController::class, 'ApiVisualizeBook']);//Obtiene un libro

/*------------------------- CONTROL ADMIN -------------------------------*/
Route::get('/getToken', [AdminController::class, 'getToken']);
Route::get('/base', [AdminController::class, 'test']);

Route::get('/godView/users', [AdminController::class, 'AdminUsers']);

Route::get('/godView/books', [AdminController::class, 'AdminBooks']);
Route::get('/godView/books/create', [AdminController::class, 'AdminCreateIndex']);
Route::get('/godView/books/edit/{id}', [AdminController::class, 'AdminEditIndex']);
Route::get('/godView/users/create', [AdminController::class, 'AdminCreateUserIndex']);
Route::get('/godView/users/edit/{id}', [AdminController::class, 'AdminEditUserIndex']);

Route::post('/godView/books/create', [AdminController::class, 'AdminCreateBook']);
Route::post('/godView/books/update', [AdminController::class, 'AdminEditBook']);
Route::post('/godView/users/create', [AdminController::class, 'AdminCreateUser']);
Route::post('/godView/users/update', [AdminController::class, 'AdminEditUser']);

Route::get('/godView/books/delete/{id}', [AdminController::class, 'AdminDeleteBook']);
Route::get('/godView/users/delete/{id}', [AdminController::class, 'AdminDeleteUser']);
