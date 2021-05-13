<?php

/*
|--------------------------------------------------------------------------
| Web Routes -  bai 14 can hoc lai
                bai 17 ke tiep
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
web nay la web hoc laravel cua Khoa Pham
http://localhost:9090/shop2/public/index
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[
'as'	=>'home-page',
'uses'	=>'FrontendController@showHome'
]);

Route::get('/san-pham',[
	'as'  =>'products',
	'uses'=>'FrontendController@showProduct'
]);

Route::get('/san-pham-detail/{id}',[
	'as'  =>'productDetail',
	'uses'=>'FrontendController@showProductDetail'
]);

Route::get('/cart',[
	'as'  =>'productCart',
	'uses'=>'FrontendController@showProductCart'
]);

Route::get('/checkout',[
	'as'  =>'checkout',
	'uses'=>'FrontendController@showCheckout'
]);
/*************************************************
**************************************************
**************************************************
**************************************************/

Route::get('index', [
	'as'   => 'Home',
	'uses' => 'PageController@getIndex'
]);

Route::get('product-type/{type}', [
	'as'   => 'ProductType',
	'uses' => 'PageController@getProductType'
]);

Route::get('product-detail/{id}', [
	'as'   => 'ProductDetail',
	'uses' => 'PageController@getProductDetail'
]);

Route::get('contact', [
	'as'   => 'Contact',
	'uses' => 'PageController@getContact'
]);

Route::get('about', [
	'as'   => 'About',
	'uses' => 'PageController@getAbout'
]);

Route::get('add-to-cart/{id}', [
	'as'   => 'addcart',
	'uses' => 'PageController@getAddToCart'
]);

Route::get('delete-cart/{id}', [
	'as'   => 'deletecart',
	'uses' => 'PageController@deleteItemCart'
]);

Route::get('want-order',[
'as'=>'order',
'uses'=>'PageController@getCheckout'
]);

Route::post('want-order',[
'as'=>'order',
'uses'=>'PageController@postCheckout'
]);