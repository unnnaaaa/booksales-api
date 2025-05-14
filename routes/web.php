<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/genre', [GenreController::class, 'index']);
Route::get('/author', [AuthorController::class, 'index']);
Route::get('/', function () {
    return view('welcome');
});
