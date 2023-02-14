<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', [ProductsController::Class, 'index']);
Route::get('/products/{id}', [ProductsController::Class, 'show']);
Route::get('/products/search/{name}', [ProductsController::Class, 'search']);
Route::post('/register', [AuthController::Class, 'register']);
Route::post('/login', [AuthController::Class, 'login']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/products', [ProductsController::Class, 'store']);
    Route::put('/products/{id}', [ProductsController::Class, 'update']);
    Route::delete('/products/{id}', [ProductsController::Class, 'destroy']);
    Route::post('/logout', [AuthController::Class, 'logout']);
});
