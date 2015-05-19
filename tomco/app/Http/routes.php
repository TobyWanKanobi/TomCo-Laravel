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

Route::get('home', function() {
    return View::make('home.home');
});

Route::get('/', function() {
    return View::make('home.home');
});

Route::get('over-ons', function() {
    return View::make('home.over-ons');
});

Route::get('contact', function() {
    return View::make('home.contact');
});

//rourw::get('/', ['as' => 'home', 'uses' => ]);
Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::post('login', ['as' => 'login_poging', 'uses' => 'Auth\AuthController@poging']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

Route::get('producten', ['as' => 'browse-products', 'uses' => 'CategorieController@index']);
Route::any('categorie/{naam}', [
  'as'   => 'categorie',
  'uses' => 'CategorieController@index'
]);

/*
|--------------------------------------------------------------------------
| Admin backend routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('admin', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
Route::get('admin/categorie/beheer', ['as' => 'categorie_beheer', 'uses' => 'CategorieController@overzicht']);

Route::get('admin/producten', ['as' => 'products', 'uses' => 'ProductController@index']);
Route::get('admin/product/nieuw', ['as' => 'create_product', 'uses' => 'ProductController@getCreate']);
Route::post('admin/product/nieuw', ['as' => 'store_product', 'uses' => 'ProductController@postCreate']);
Route::get('admin/product/wijzig/{id}', ['as' => 'edit_product', 'uses' => 'ProductController@getEdit']);
Route::post('admin/product/wijzig', ['as' => 'save_product', 'uses' => 'ProductController@postEdit']);
Route::delete('admin/product/verwijder/{id}', ['as' => 'delete_product', 'uses' => 'ProductController@postDelete']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

