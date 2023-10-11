<?php

use App\Http\Controllers\BodegaController;
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
    return view('welcome');
});

Route::get('/listar',[BodegaController::class,'listar']);

Route::get('/comprar/{id}/{cantidad}',[BodegaController::class,'comprar']);
Route::get('/comprar',[BodegaController::class,'comprarv2']);
Route::get('/vender/{id}/{cantidad}',[BodegaController::class,'vender']);