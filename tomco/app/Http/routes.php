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
Route::get('aboutus', ['as' => 'about_us', 'uses' => 'ShopController@aboutus']);
Route::get('contact', ['as' => 'contact', 'uses' => 'ShopController@contact']);

/*
|--------------------------------------------------------------------------
| Admin backend routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
Route::get('admin/product/overzicht', ['as' => 'overzicht_product', 'uses' => 'ProductController@overzicht']);
Route::delete('admin/product/overzicht/{id}', ['as' => 'verwijderen', 'uses' => 'ProductController@verwijderen']);
Route::post('admin/product/overzicht/{id}', ['as' => 'change_product', 'uses' => 'ProductController@wijzigen']);
Route::get('admin/product/nieuw', ['as' => 'nieuw_product', 'uses' => 'ProductController@nieuw']);
Route::post('admin/product/nieuw', ['as' => 'save_product', 'uses' => 'ProductController@opslaan']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

