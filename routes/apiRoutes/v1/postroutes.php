<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::resource('/posts', App\Http\Controllers\V1\PostController::class);
Route::get('/myposts', [App\Http\Controllers\V1\PostController::class, 'myPosts']);