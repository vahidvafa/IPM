<?php

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

use Illuminate\Support\Facades\Route;


Route::get('/', 'IndexController@index')->name('main');
Route::get('/contact_us/', 'MessageController@create')->name('message.create');
Route::post('/contact_us/', 'MessageController@store')->name('message.store');
Route::get('/users', 'UserController@usersIndex')->name('user.index');
Route::post('/users', 'UserController@usersIndex')->name('user.search');
Route::get('/search/', 'IndexController@search')->name('search');
Route::post('/search', 'IndexController@search')->name('search.post');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register/store', 'AuthController@postRegister')->name('register.store');
Route::get('/event/{id}', 'EventController@index')->name("event");
Route::get('/profile/{slug}', 'UserController@index')->name("profile");
Route::get('404', function () {
    return view("404");
})->name("404");
Route::post('/login', 'AuthController@postLogin')->name('login.post');
Route::get('/login', 'AuthController@Login')->name('login')->middleware('guest');
Route::get('about-us', 'IndexController@about_us')->name('about-us');
Route::get('news/{news}', 'NewsController@show')->name('news.show');
Route::middleware('auth')->group(function () {
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::post('/logout', 'UserController@logout')->name('logout.post');
    Route::middleware('checkAdmin')->group(function (){
        Route::prefix('/cms/')->group(function () {

            Route::get('/', 'IndexController@cms')->name('cms.index');

            Route::get('news/', 'NewsController@indexCms')->name('news.index');
            Route::get('news/create', 'NewsController@create')->name('news.create');
            Route::get('news/{news}/edit', 'NewsController@edit')->name('news.edit');
            Route::post('news/store', 'NewsController@store')->name('news.store');
            Route::post('news/{news}/delete', 'NewsController@destroy')->name('news.delete');
            Route::post('news/{news}/update', 'NewsController@update')->name('news.update');
            //------
            Route::get('events/', 'EventController@indexCms')->name('event.index');
            Route::get('events/create', 'EventController@create')->name('event.create');
            Route::get('events/{event}/edit', 'EventController@edit')->name('event.edit');
            Route::post('events/store', 'EventController@store')->name('event.store');
            Route::post('events/{event}/delete', 'EventController@destroy')->name('event.delete');
            Route::post('events/{event}/update', 'EventController@update')->name('event.update');
            //------
            Route::get('messages/', 'MessageController@index')->name('message.index');
            Route::post('messages/{message}/delete', 'MessageController@destroy')->name('message.delete');
        });
    });
});


Route::get('news','NewsController@indexWeb')->name('news');
Route::post('/user/update', 'UserController@Update')->name('user.update');
Route::post('user/updateAdm','UserController@UpdateAdm')->name('user.updateAdm');

Route::post("/applyJob","RequestController@store")->name("applyJob");
Route::get('news', 'NewsController@index')->name('news');

Route::resource("job","JobController");
