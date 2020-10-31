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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/import','App\Http\Controllers\RecipeController@import');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'selectCategory']);
Route::group(['prefix'=>'blog'],function(){
    Route::get('','App\Http\Controllers\BlogController@index');
    Route::get('/{id}','App\Http\Controllers\BlogController@showBlog');
    Route::post('/post','App\Http\Controllers\BlogController@postBlog');
}); 
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
