<?php

use App\Http\Controllers\API\Admin\CategoriesController;
use App\Http\Controllers\API\Admin\PostsController;
use App\Http\Controllers\API\Admin\RolesController;
use App\Http\Controllers\API\Admin\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// public api calls
Route::get('/comments', [\App\Http\Controllers\API\Admin\CommentsController::class, 'index'])
    ->name('comments.index');

Route::post('/comment', [\App\Http\Controllers\API\Admin\CommentsController::class, 'store'])
    ->name('comments.store');
