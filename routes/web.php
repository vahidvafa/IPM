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
Route::get('404', function () {
    return view("404");
})->name("404");
Route::post('/login', 'AuthController@postLogin');
Route::get('about-us', 'IndexController@about_us')->name('about-us');
Route::get('news/{news}', 'NewsController@show')->name('news.show');

Route::prefix('/cms/')->group(function (){
    Route::get('news/', 'NewsController@index')->name('news.index');
    Route::get('news/create', 'NewsController@create')->name('news.create');
    Route::get('news/{news}/edit', 'NewsController@edit')->name('news.edit');
    Route::post('news/store', 'NewsController@store')->name('news.store');
    Route::post('news/{news}/delete', 'NewsController@destroy')->name('news.delete');
    Route::post('news/{news}/update', 'NewsController@update')->name('news.update');
});

Route::get('logout','UserController@logout')->name('logout');
Route::get('news','NewsController@indexWeb')->name('news');
Route::post('/user/update', 'UserController@Update')->name('user.update');
Route::post('user/updateAdm','UserController@UpdateAdm')->name('user.updateAdm');

Route::get("/jobs","JobController@jobs")->name("jobs");
Route::post("/jobs","JobController@jobs")->name("jobs");
Route::post("/applyJob","RequestController@store")->name("applyJob");


Route::resource("job","JobController");

/*Route::get("/job/{id}","JobController@show")->name("job.detail");
Route::get("/job/edit/{id}","JobController@edit")->name("job.edit");
Route::post("/job/del/{id}","JobController@destroy")->name("job.del");
Route::post("/job/update","JobController@update")->name("job.update");
Route::post("/job/create","JobController@store")->name("job.create");
Route::get("/job/create","JobController@create")->name("job.create");*/