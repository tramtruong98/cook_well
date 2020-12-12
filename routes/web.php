<?php

use App\Models\Recipe;
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
// Route::get('/', function () {
//     return view('course');
// });
Route::post('/import', 'App\Http\Controllers\RecipeController@importPost');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/search-posts', [App\Http\Controllers\SearchController::class, 'resultSearch'])->name('search');
Route::get('/category/{id}', [App\Http\Controllers\PageController::class, 'selectCategory']);
Route::get('/tag/{id}', [App\Http\Controllers\PageController::class, 'selectTag']);
Route::post('/post/delete/{id}', [App\Http\Controllers\ProfileController::class, 'deleteBlog']);
Route::group(['prefix' => 'blog'], function () {
    Route::get('/like', 'App\Http\Controllers\BlogController@likePost')->name('like');
    Route::get('', 'App\Http\Controllers\BlogController@index')->name('blog');
    Route::get('/{id}', 'App\Http\Controllers\BlogController@showBlog');
    Route::post('/post', 'App\Http\Controllers\BlogController@postRecipe');
    
});
Route::get('/{id}/blog', 'App\Http\Controllers\BlogController@showUserRecipe');
Route::get('/my-blog', 'App\Http\Controllers\ProfileController@myBlog');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profileUpdate');
Route::post('/profiles/{id}/follow','App\Http\Controllers\FollowController@store')->name('follow');
Route::post('{id}/post-comment', 'App\Http\Controllers\BlogController@postComment');
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/home','App\Http\Controllers\Admin\AdminController@index')->name('dasboard');
    Route::get('/recipes','App\Http\Controllers\Admin\AdminController@showRecipes')->name('recipe.index');
    Route::get('/posts','App\Http\Controllers\Admin\AdminController@showPosts')->name('post.index');
    Route::get('/tags','App\Http\Controllers\Admin\AdminController@showTags')->name('tag.index');
    Route::get('/courses','App\Http\Controllers\Admin\AdminController@showCourses')->name('course.index');
    Route::get('/users','App\Http\Controllers\Admin\AdminController@showUsers')->name('user.index');
    Route::get('/edit','App\Http\Controllers\Admin\AdminController@editProfile')->name('profile.update');
    Route::get('/search','App\Http\Controllers\Admin\SearchController@search')->name('admin.search');
});
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/recipe/create','App\Http\Controllers\Admin\RecipeController@create');
    Route::post('/recipe/store','App\Http\Controllers\Admin\RecipeController@store');
    Route::get('/recipe/edit','App\Http\Controllers\Admin\RecipeController@edit');
    Route::post('/recipe/update','App\Http\Controllers\Admin\RecipeController@update');
    Route::delete('/recipe/delete','App\Http\Controllers\Admin\RecipeController@destroy');
});
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/post/create','App\Http\Controllers\Admin\PostController@create');
    Route::post('/post/store','App\Http\Controllers\Admin\PostController@store');
    Route::get('/post/edit','App\Http\Controllers\Admin\PostController@edit');
    Route::post('/post/update','App\Http\Controllers\Admin\PostController@update');
    Route::delete('/post/delete','App\Http\Controllers\Admin\PostController@destroy');
});
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/tag/create','App\Http\Controllers\Admin\TagController@create');
    Route::post('/tag/store','App\Http\Controllers\Admin\TagController@store');
    Route::get('/tag/edit','App\Http\Controllers\Admin\TagController@edit');
    Route::post('/tag/update','App\Http\Controllers\Admin\TagController@update');
    Route::delete('/tag/delete','App\Http\Controllers\Admin\TagController@destroy');
});
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/course/create','App\Http\Controllers\Admin\CourseController@create');
    Route::post('/course/store','App\Http\Controllers\Admin\CourseController@store');
    Route::get('/course/edit','App\Http\Controllers\Admin\CourseController@edit');
    Route::post('/course/update','App\Http\Controllers\Admin\CourseController@update');
    Route::delete('/course/delete','App\Http\Controllers\Admin\CourseController@destroy');
});
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    //Route::get('/user/create','App\Http\Controllers\Admin\UserController@create');
    Route::post('/user/store','App\Http\Controllers\Admin\UserController@store');
    Route::post('/user/edit/{id}','App\Http\Controllers\Admin\UserController@edit');
    //Route::post('/user/update','App\Http\Controllers\Admin\UserController@update');
    Route::delete('/user/delete/{id}','App\Http\Controllers\Admin\UserController@destroy');
});
