<?php

use App\Http\Controllers\Posts;
use Illuminate\Support\Facades\Route;

Route::get('/', [Posts::class, 'index'])->name('home');
