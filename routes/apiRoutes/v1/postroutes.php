<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::resource('/posts', App\Http\Controllers\V1\PostController::class);