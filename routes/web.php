<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\Auth\Sessions;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Comments;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Public\CarPublicController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->middleware('guest')->group(function () {
    Route::controller(Sessions::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store')->name('login');
        //Route::post('/logout', 'destroy')->name('logout');
    });
});
//Route::get('/auth/login', [Sessions::class, 'create'])->name('auth.sessions.create');

Route::middleware('auth')->get('/secret', function () {
    return 'secret page';
});

Route::middleware('auth', 'verified')->prefix('/admin')->group(function () {
    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::resource('posts', PostController::class);

    //Route::get('/', fn() => view('home'))->name('home');
    /*Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');*/

    //Route::middleware('can:cars')->group(function () { // Gate in AppServiceProvider
    Route::get('cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
    Route::patch('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore');
    Route::resource('cars', CarController::class);
    //});


    Route::resource('brands', BrandController::class);
    Route::get('/account', [Account::class, 'index'])->name('account.index');
    Route::delete('/logout', [Sessions::class, 'destroy'])->name('logout');
});

Route::get('/', [CarPublicController::class, 'index'])->name('home.public');
Route::get('/catalog/{car}', [CarPublicController::class, 'show'])->name('catalog.show');

Route::post('/comments', [Comments::class, 'store'])->name('comments.store');
