<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [ListingController::class, 'index']);


Route::get('/login', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users/signup', [UserController::class, 'store']);
Route::post('/users/signin', [UserController::class, 'login']);

Route::middleware(['auth'])->group(function() {
    Route::get('/posts/create', [ListingController::class, 'create']);
    Route::get('/posts/manage', [ListingController::class, 'manage'])->name('manage.post');
    Route::get('/posts/{id}/edit', [ListingController::class, 'edit']);
    Route::delete('/posts/{id}', [ListingController::class, 'destroy']);
    Route::put('/posts/{id}', [ListingController::class, 'update']);
    Route::post('/posts', [ListingController::class, 'store']);

    Route::post('/users/logout', [UserController::class, 'logout']);
});

Route::get('/posts/{id}', [ListingController::class, 'show']);
