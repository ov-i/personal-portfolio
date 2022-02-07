<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PostCategoryController;
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

Route::get('/', [HomePageController::class, 'index'])->name('home.index');
Route::get('/download_cv', [HomePageController::class, 'download'])->name('home.download');

// Blog section
Route::get("/blog", [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/posts/{post}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category}/posts', [BlogController::class, 'categories'])
    ->name('blog.categories');
