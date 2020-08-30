<?php

use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'Frontend\FrontendController@index');

Route::get('/about-us', 'Frontend\FrontendController@aboutUs')->name('about.us');
Route::get('/contact-us', 'Frontend\FrontendController@contactUs')->name('contact.us');

//Manage user routes-------------------------------------------------------------------

Route::prefix('users')->group(function(){

	Route::get('/view','Backend\UserController@view')->name('users.view');
	Route::get('/add','Backend\UserController@add')->name('users.add');
	Route::post('/store','Backend\UserController@store')->name('users.store');
	Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
	Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
	Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');

});


//Manage profile routes-----------------------------------------------------------------

Route::prefix('profiles')->group(function(){

	Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
	Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
	Route::post('/update','Backend\ProfileController@update')->name('profiles.update');
	Route::get('/change/password','Backend\ProfileController@changePassword')->name('profiles.password.change');
	Route::post('/update/password','Backend\ProfileController@updatePassword')->name('profiles.password.update');

});



//Logo management routes-----------------------------------------------------------------

Route::prefix('logos')->group(function(){

	Route::get('/view','Backend\LogoController@view')->name('logos.view');
	Route::get('/add','Backend\LogoController@add')->name('logos.add');
	Route::post('/store','Backend\LogoController@store')->name('logos.store');
	Route::get('/edit/{id}','Backend\LogoController@edit')->name('logos.edit');
	Route::post('/update/{id}','Backend\LogoController@update')->name('logos.update');
	Route::get('/delete/{id}','Backend\LogoController@delete')->name('logos.delete');
	

});