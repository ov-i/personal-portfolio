<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\Admin\CategoriesController;
use App\Http\Controllers\API\Admin\PostsController;
use App\Http\Controllers\API\Admin\RolesController;
use App\Http\Controllers\API\Admin\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

// home actions
Route::get('/', [HomePageController::class, 'index'])->name('home.index');
Route::get('/download_cv', [HomePageController::class, 'download'])->name('home.download');

// auth actions
Route::get('/logowanie', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::get('/rejestracja', [AuthController::class, 'registerForm'])->name('auth.registerForm');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

// Blog section
Route::get("/blog", [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog/search', [SearchController::class, '__invoke'])->name('blog.search');
Route::get('/blog/wpisy/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/kategoria/{category:name}/wpisy', [BlogController::class, 'categories'])
    ->name('blog.categories');

Route::get('/blog/tags/{tag:name}/posts', [BlogController::class, 'tags'])->name('blog.tags');

// routes protected by auth
Route::middleware('admin')->group(function () {
    // administration panel
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/', 'index')->name('admin.home');
        Route::get('/{wildcard}', 'index');
        Route::get('/{wildcard}/{current}', 'index');
        Route::get('/{wildcard}/{current}/edit', 'index');
        Route::get('/{wildcard}/{current}/show', 'index');
        Route::get('/{wildcard}/{current}/preview', 'index');
    });

    // api calls
    Route::prefix('api')->group(function () {
        Route::get('/authData', function () {
            if (!auth()->check())
                return response()->json(['error' => true, 'data' => []], 400);

            $data = auth()->user();
            return response()->json(['error' => false, 'data' => $data]);
        });
        Route::apiResource('/users', UsersController::class);
        Route::apiResource('/posts', PostsController::class);
        Route::put('/post/{post}/publish', [PostsController::class, 'publishPost']);
        Route::put('/post/{post}/unPublish', [PostsController::class, 'unPublishPost']);
        Route::apiResource('/categories', CategoriesController::class);
        Route::apiResource('/roles', RolesController::class);
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::controller(UserController::class)->prefix('panel')->group(function() {
        Route::get('/', fn() => 'Panel użytkownika')->name('user.home');
    });

    Route::post('/blog/wpisy/{post:slug}/komentarz', [App\Http\Controllers\CommentsController::class, 'store'])->name('blog.comments.store');
});
