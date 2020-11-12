<?php

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

Route::get('/', [App\Http\Controllers\PageController::class, 'index']);
Route::post('/import', 'App\Http\Controllers\RecipeController@import');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [App\Http\Controllers\PageController::class, 'selectCategory']);
Route::group(['prefix' => 'blog'], function () {
    Route::get('', 'App\Http\Controllers\BlogController@index')->name('blog');
    Route::get('/{id}', 'App\Http\Controllers\BlogController@showBlog');
    Route::post('/post', 'App\Http\Controllers\BlogController@postRecipe');
    
});
Route::get('/{id}/blog', 'App\Http\Controllers\BlogController@showUserRecipe');
Route::get('/my-blog', 'App\Http\Controllers\ProfileController@myBlog');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profiles/{id}/follow','App\Http\Controllers\FollowController@store')->name('follow');
Route::post('{id}/post-comment', 'App\Http\Controllers\BlogController@postComment');
