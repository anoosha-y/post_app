<?php

use App\Http\Controllers\PostController;
use Illuminate\Routing\RouteRegistrar;
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

// Route::get('/', function () {
//     return view('home');
// });


//Route::get('/', "PostController@index")->name('index');

//Route::post('store', "PostController@store")->name('store');

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('home');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'post'], function(){
    Route::get('/', 'PostsController@index')->name('post.index');
    Route::get('create', 'PostsController@create')->name('post.create');
    Route::post('store', 'PostsController@store')->name('post.store');
    Route::get('/{id}', 'PostsController@show')->name('post.show'); 
    Route::get('post', 'PostsController@create')->name('post.create');

    Route::get('/{id}/{name}', 'PostsController@edit')->name('post.edit');
    Route::post('update', 'PostsController@update')->name('post.update');
    Route::get('/{id}/{name}/{image}', 'PostsController@destroy')->name('post.delete');
    

});

// Route::get('/{id}', 'PostsController@destroy')->name('delete');


Route::get('/contact', function(){
    return view ('contact');
})->name('contact');

Route::get('/{id}', 'LikeController@show')->name('like.show'); 

// Route::post('/{id}', 'LikeController@show')->name('like.show'); 