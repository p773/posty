<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\MessageController;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|php 


*/

Route::get('/', function () {  return view('home'); });

Route::post('/', function () {
    return view('home');
});

//Route::get('/home', function () { return view('home'); })->name('home');

Route::get('/home', [DashboardController::class, 'home'])->name('home');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/oldest', [DashboardController::class, 'oldest'])->name('dashboard.oldest');
Route::get('/dashboard/popular', [DashboardController::class, 'popular'])->name('dashboard.popular');
Route::get('/dashboard/commented', [DashboardController::class, 'commented'])->name('dashboard.commented');
Route::post('/dashboard', [DashboardController::class, 'showcat'])->name('dashboard');
//Route::get('/dashboard/{category}', [DashboardController::class, 'showcatt'])->name('dashboard');

//Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');




Route::get('/register', [RegisterController::class, 'index'])->name('register'); // trzeba stworzyć kontrolerphp
Route::post('/register', [RegisterController::class, 'store'])->name('register'); 

Route::get('/login', [LoginController::class, 'index'])->name('login'); 
Route::post('/login', [LoginController::class, 'store']); 




//Route::get('/posts', function () {
    //return view('posts.index');
//})->name('posts');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store'])->name('posts');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//Route::post('/comments/{post}', [PostController::class, 'comment'])->name('comments');
Route::post('/comments/{post}', [PostController::class, 'save'])->name('comment');
Route::get('/comments/{post}', [PostController::class, 'comment'])->name('comments');


Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');


Route::post('/users/messages', [MessageController::class, 'store'])->name('messages');

Route::get('/users/messages', [MessageController::class, 'index'])->name('messages');

Route::get('/users/chat/{receiver}', [MessageController::class, 'chat'])->name('chat');