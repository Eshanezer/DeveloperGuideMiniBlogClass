<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Faker\Calculator\TCNo;
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

Route::get('/',[HomeController::class,'index'])->name('home');

//Public Routes
Route::get('post/category/{id}',[HomeController::class,'getPostByCategory'])->name('Post.Category');
Route::get('post/{id}',[PostController::class,'show'])->name('post.show');

//User controller Routes
Route::get('login',[UserController::class,'showLogin'])->name('login');
Route::get('register',[UserController::class,'showRegister'])->name('register');

Route::post('register',[UserController::class,'register'])->name('register.form');
Route::post('login',[UserController::class,'login'])->name('login.form');
Route::get('logout',[UserController::class,'logout'])->name('logout');

// Comment Management
Route::post('comment',[CommentController::class,'store'])->name('comment.store');

// Management Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::get('post', [PostController::class,'index'])->name('post.index');
    Route::post('post', [PostController::class,'store'])->name('post.store');
    Route::delete('post/{id}', [PostController::class,'destroy'])->name('post.destroy');

    Route::get('comment/{postId}',[CommentController::class,'show'])->name('comment.show');
    Route::put('comment/{id}',[CommentController::class,'update'])->name('comment.update');

    Route::get('system/user', [UserController::class,'users'])->name('sytem.users')->middleware('checkAdminPermission');
    Route::put('user/{id}',[UserController::class,'update'])->name('user.update');
});