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

Route::get('/', 'FrontendController@getHome');

Route::get('detail/{id}', 'FrontendController@getDetail');
Route::post('detail/{id}', 'FrontendController@postComment');

Route::get('category/{id}', 'FrontendController@getCategory');

Route::get('search', 'FrontendController@getSearch');

Route::post('add-to-cart', 'FrontendController@postAddToCart');

Route::get('cart', 'FrontendController@getCart');
Route::post('cart', 'FrontendController@postCompleteShopping');

Route::get('cart/delete/{id}', 'FrontendController@deleteOneItemOfCart');

Route::get('delete-cart', 'FrontendController@deleteAllOfCart');

Route::post('update-cart', 'FrontendController@postUpdateCart');

Route::get('complete', 'FrontendController@getComplete');

Route::get('checkout', 'CheckoutController@getCheckout');

Route::group(['namespace'=>'Admin'], function(){
	Route::group(['prefix'=>'login', 'middleware'=>'CheckLogedIn'], function(){
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});

	Route::get('logout', 'HomeController@getLogout');
	Route::group(['prefix'=>'admin', 'middleware'=>'CheckLogedOut'], function(){
		Route::get('home', 'HomeController@getHome');

		Route::group(['prefix'=>'category'], function(){
			Route::get('/', 'CategoryController@getCate');
			Route::post('/', 'CategoryController@postCate');

			Route::get('edit/{id}', 'CategoryController@getEditCate');
			Route::post('edit/{id}', 'CategoryController@postEditCate');

			Route::get('delete/{id}', 'CategoryController@getDeleteCate');
		});

		Route::group(['prefix'=>'product'], function(){
			Route::get('/', 'ProductController@getProduct');

			Route::get('add', 'ProductController@getAddProduct');
			Route::post('add', 'ProductController@postAddProduct');

			Route::get('edit/{id}', 'ProductController@getEditProduct');
			Route::post('edit/{id}', 'ProductController@postEditProduct');

			Route::get('delete/{id}', 'ProductController@getDeleteProduct');
		});
	});
});

//API:
Route::get('/api/get-cart-checkout', 'FrontendController@getApiCart');

Route::post('/api/post-checkout', 'FrontendController@postApiCheckOut');
