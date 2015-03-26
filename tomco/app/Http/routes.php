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
Route::get('home', 'HomeController@index');

Route::get('/', function() {
    return View::make('pages.home');
});



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
