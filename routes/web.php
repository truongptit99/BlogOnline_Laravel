<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/users/activeOrDeactive', [UserController::class, 'activeOrDeactive'])->name('users.active_deactive');
    Route::get('/statistic', [AdminController::class, 'statistic'])->name('admin.statistic');
    Route::resource('users', UserController::class)->only([
        'index', 'edit', 'update', 'destroy'
    ]);
    Route::resource('categories', CategoryController::class)->only([
        'index', 'create', 'store', 'edit', 'update', 'destroy'
    ]);
});

Route::group(['middleware' => ['auth', 'active']], function () {
    Route::resource('posts', PostController::class)->except('show');
    Route::resource('comments', CommentController::class);
});
Route::get('/findPostByCategoryId/{cate}', [PostController::class, 'findPostByCategoryId'])->name('posts.find_by_cate_id');
Route::get('/findPostByName', [PostController::class, 'findPostByName'])->name('posts.find_by_name');
Route::get('/findPostByUserId/{user}', [PostController::class, 'findPostByUserId'])->name('posts.find_by_user_id');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
