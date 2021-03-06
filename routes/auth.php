<?php
Route::group(['prefix'=>'/auth'], function(){
	Route::get('/index','Auth\LandingPageController@index');
	
	Route::group(['prefix'=>'/category'],function(){
		Route::get('/index','Auth\CategoryController@index');
		Route::get('/view','Auth\CategoryController@view');

	});

	Route::group(['prefix'=>'/book'],function(){
		Route::get('/index','Auth\BookController@index');
		Route::get('/view','Auth\BookController@view');

	});

	Route::group(['prefix'=>'/order'],function(){
		Route::get('/index','Auth\OrderController@index');
		Route::get('/view','Auth\OrderController@view');

	});
});