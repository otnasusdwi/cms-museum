<?php

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

Route::get('/', 'FrontEnd\HomeController@index');

Auth::routes();

Route::prefix('admin')->group(function(){
	Route::get('/home', 'BackEnd\HomeController@index')->name('back-end.home');
	Route::get('/about', 'BackEnd\AboutController@index')->name('back-end.about');

	Route::get('/gallery', 'BackEnd\GalleryController@index')->name('back-end.gallery');
	Route::get('/gallery/add', 'BackEnd\GalleryController@add')->name('back-end.addgallery');
	Route::post('/gallery/store', 'BackEnd\GalleryController@store')->name('back-end.storegallery');
	Route::get('/gallery/edit/{id}', 'BackEnd\GalleryController@edit')->name('back-end.editgallery');
	Route::post('/gallery/update', 'BackEnd\GalleryController@update')->name('back-end.updategallery');
	Route::get('/gallery/delete/{id}', 'BackEnd\GalleryController@delete')->name('back-end.deletegallery');

	Route::get('/news', 'BackEnd\NewsController@index')->name('back-end.news');
	Route::get('/news/add', 'BackEnd\NewsController@add')->name('back-end.addnews');
	Route::post('/news/store', 'BackEnd\NewsController@store')->name('back-end.storenews');
	Route::get('/news/edit/{id}', 'BackEnd\NewsController@edit')->name('back-end.editnews');
	Route::post('/news/update', 'BackEnd\NewsController@update')->name('back-end.updatenews');
	Route::get('/news/delete/{id}', 'BackEnd\NewsController@delete')->name('back-end.deletenews');
});

Route::get('/home', 'FrontEnd\HomeController@index')->name('front-end.home');
Route::get('/about', 'FrontEnd\AboutController@index')->name('front-end.about');
Route::get('/gallery', 'FrontEnd\GalleryController@index')->name('front-end.gallery');
Route::get('/news', 'FrontEnd\NewsController@index')->name('front-end.news');
Route::get('/news/detail/{id}', 'FrontEnd\NewsController@detail')->name('front-end.detailnews');
