<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('home', function() {
    return View::make('pages.home');
});

Route::get('/', function() {
    return View::make('pages.home');
});



Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::post('login', ['as' => 'login_poging', 'uses' => 'Auth\AuthController@poging']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
Route::get('products/browse', ['as' => 'browse-products', 'uses' => 'ShopController@product']);

/*
|--------------------------------------------------------------------------
| Admin backend routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
Route::get('admin/product/nieuw', ['as' => 'nieuw_product', 'uses' => 'ProductController@nieuw']);
Route::post('admin/product/nieuw', ['as' => 'save_product', 'uses' => 'ProductController@opslaan']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
