<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/register', function () {
    $componentName = "register-form";
    return view('main',compact('componentName'));
});

Route::post('/register', [UserController::class,'register']);

Route::get('/login', function () {
    $componentName = "login-form";
    return view('main',compact('componentName'));
});
// Route::get('/login',function () {
//     return view('login');
// });
