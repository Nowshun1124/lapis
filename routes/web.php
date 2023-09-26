<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ViewController;
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
    Route::get('/profile/shows/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile', [ProfileController::class, 'select'])->name('account_type.select');
    Route::get('/donations', [DonationController::class, 'index'])->name('donate.index');
    Route::post('/donatios/done', [DonationController::class, 'donate'])->name('donate');
    Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('follow');
    Route::get('youtube/channels/{id}/titles', 'Api\YoutubeController@getListByChannelId');
    Route::get('/mu/upload', [PostController::class, 'upload_index'])->name('upload.index');
    Route::post('/mu/upload/up', [PostController::class, 'upload'])->name('upload');
    Route::get('/songs', [ViewController::class, 'songs'])->name('songs');
    Route::get('/songs/info/{song}', [ViewController::class, 'info'])->name('songs.info');
    Route::get('/artist', [ViewController::class, 'artist'])->name('artist');
    Route::get('/categories/{category}', [ViewController::class,'index']);
    Route::get('/youtube', [ViewController::class, 'youtube'])->name('youtube');
    Route::get('/yt/upload', [ViewController::class, 'yt_index'])->name('yt_index');
    Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');
    Route::delete('/posts/{post}', [PostController::class,'delete'])->name('delete');
    Route::delete('/songs/{song}', [PostController::class,'s_delete'])->name('sons.delete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
