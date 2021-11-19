<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/regis', [HomeController::class, 'regis'])->name('login');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->middleware('auth');
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::post('/postingan', [HomeController::class, 'postingan'])->middleware('auth');
Route::get('/editpost/{id}', [HomeController::class, 'editpost'])->middleware('auth');
Route::get('/editpassword/{id}', [HomeController::class, 'showpassword'])->middleware('auth');
Route::post('/editpassword/{id}', [HomeController::class, 'gantipassword'])->middleware('auth');
Route::post('/postingan', [HomeController::class, 'postingan'])->middleware('auth');
Route::post('/update/{id}', [HomeController::class, 'update'])->middleware('auth');
Route::post('/komen/{id}', [HomeController::class, 'komen'])->middleware('auth');
Route::post('/regis', [LoginController::class, 'create']);
Route::post('/postlogin', [LoginController::class, 'postlogin']);
Route::get('/logout', [LoginController::class, 'logout']);