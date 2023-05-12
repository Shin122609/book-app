<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('/', [GenreController::class, 'index'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('genres', GenreController::class)->only(['index','store','update','destroy'])->middleware('auth');

Route::resource('genres.books',BookController::class)->only(['store','update','destroy'])->middleware('auth');

Route::resource('priorities', PriorityController::class)->only(['store','update','destroy'])->middleware('auth');
