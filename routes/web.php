<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('create');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show');
    Route::post('/posts', [PostController::class, 'store'])->name('store');
    Route::post('/posts/comment/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/posts/like/{id}', [PostController::class, 'like'])->name('post.like');
    Route::get('/posts/unlike/{id}', [PostController::class, 'unlike'])->name('post.unlike');
    Route::get('/profile/shows', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'select'])->name('account_type.select');
    Route::delete('/posts/{post}', [PostController::class,'delete'])->name('delete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
