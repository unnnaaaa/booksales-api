<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;  
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;


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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('books', BookController::class)->only(['index', 'show']);



//rute yang butuh otentikasi 
Route::middleware(['auth:api'])->group(function(){
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['role:customer'])->group(function () {
Route::post('/transactions', [TransactionController::class, 'store']);
Route::put('/transactions/{transaction}', [TransactionController::class, 'update']); 
Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);   
});

//hanya untuk admin

Route::middleware(['role:admin'])->group(function(){
Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
Route::get('/transactions', [TransactionController::class, 'index']);     
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);
Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
Route::apiResource('books', BookController::class)->only(['update', 'destroy']);

});
});