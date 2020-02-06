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
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register/store', 'AuthController@postRegister')->name('register.store');
Route::get('/event/{id}', 'EventController@index')->name("event");
Route::get('/profile/{slug}', 'UserController@index')->name("profile");
Route::get('404',function (){
    return view("404");
});
Route::post('/login','AuthController@postLogin');
Route::get('about-us','IndexController@about_us')->name('about-us');
Route::get('news/{news}','NewsController@show')->name('news.show');
Route::get('news/','NewsController@index')->name('news.index');
Route::get('logout','UserController@logout')->name('logout');
Route::get('news','NewsController@indexWeb')->name('news');