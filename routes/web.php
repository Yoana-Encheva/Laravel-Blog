<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\PostsController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'index']);

Route::post('/posts/{post}/comment', [App\Http\Controllers\CommentController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create']);
    Route::get('/posts/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit']);
    Route::get('/posts/{post}/delete', [App\Http\Controllers\PostsController::class, 'destroy']);
    Route::patch('/posts/{post}', [App\Http\Controllers\PostsController::class, 'update']);
    Route::get('/posts/{post}', [App\Http\Controllers\PostsController::class, 'show']);
    Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store']);
});
