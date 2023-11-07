<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    $componentName = "carousel";
    return view('main', compact('componentName'));
})->name('main');

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class,'register']);
// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// profile 
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::patch('/profile', [ProfileController::class, 'update']);
Route::delete('/delete/{user_id}',[UserController::class, 'delete']);
// show all post
Route::get('/post', [PostController::class, 'index'])->name('post');
// post form
Route::get('/create/post', [PostController::class, 'createPost'])->name('createPostForm');
Route::post('/post',[PostController::class,'create']);
// show detail post contents
Route::get('/post/{post_id}',[PostController::class,'show'])->name('detailPost');

// post edit form
Route::get('/post/edit/{post_id}',[PostController::class,'editForm'])->name('editPost');
Route::put('/post/edit/{post_id}',[PostController::class,'edit']);
// delete post
Route::delete('/post/delete/{post_id}',[PostController::class,'delete']);

// comment
// create comment
Route::post('/post/{post_id}/comments',[CommentController::class,'create']);
