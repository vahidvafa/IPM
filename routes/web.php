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


Route::get('/','IndexController@index')->name('/');
Route::get('/register','IndexController@register')->name('register');
Route::get('/event/{id}','EventController@index')->name("event");
Route::get('/profile/{slug}','UserController@index')->name("profile");
