<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
Route::patch('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore');
Route::resource('cars', CarController::class);

Route::resource('brands', BrandController::class);
