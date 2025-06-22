<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(['auth:sanctum']);


Route::resource('articles', ArticleController::class)
    ->only(['index', 'store', 'show', 'update', 'destroy']);


// create custom api route

Route::get('/articles/{article}/comments', [ArticleController::class, 'comments']);
Route::get('/articles/{article}/price', [ArticleController::class, 'price'])->middleware('auth:sanctum');
