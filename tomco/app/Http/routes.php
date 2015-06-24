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

Route::get('home', ['as' => 'home', 'uses' => function() {
    return View::make('home.home');
}]);

Route::get('/', function() {
    return View::make('home.home');
});

Route::get('over-ons', ['as' => 'overons', 'uses' => function() {
    return View::make('home.over-ons');
}]);

Route::get('contact', ['as' => 'contact', 'uses' => function() {
    return View::make('home.contact');
}]);

//rourw::get('/', ['as' => 'home', 'uses' => ]);
Route::get('register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@login']);
Route::post('login', ['as' => 'login_poging', 'uses' => 'Auth\AuthController@poging']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

Route::get('zoeken', ['as' => 'search', 'uses' => 'ShopController@search']);

//more information
Route::get('meerinformatie/{id}', ['as' => 'more_information', 'uses' => 'CategorieController@start']);

//Shoppingcart
Route::get('kassa', ['as' => 'checkout', 'uses' => 'ShopController@checkout', 'middleware' => 'auth']);
Route::get('winkelwagen', ['as' => 'shopping_cart', 'uses' => 'ShopController@shoppingCart']);
//Route::get('winkelwagen/add/{id}/{quantity}', ['as' => 'add_to_cart', 'uses' => 'ShopController@addToCart']);
Route::any('winkelwagen/add', ['as' => 'add_to_cart', 'uses' => 'ShopController@addToCart']);
Route::get('winkelwagen/remove/{id}', ['as' => 'remove_from_cart', 'uses' => 'ShopController@removeFromCart']);

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

Route::get('admin/categorie/nieuw', ['as' => 'create_categorie', 'uses' => 'CategorieController@getCreate']);
Route::post('admin/categorie/nieuw', ['as' => 'store_categorie', 'uses' => 'CategorieController@toevoegen']);
Route::get('admin/categorie/wijzig/{id}', ['as' => 'edit_categorie', 'uses' => 'CategorieController@getEdit']);
Route::post('admin/categorie/wijzig', ['as' => 'save_categorie', 'uses' => 'CategorieController@wijzigen']);
Route::delete('admin/categorie/verwijder/{id}', ['as' => 'delete_categorie', 'uses' => 'CategorieController@verwijderen']);

Route::get('admin/bestellingen', ['as' => 'bestellingen', 'uses' => 'BestellingController@index']);
Route::get('admin/bestellingen/{id}', ['as' => 'bestelling', 'uses' => 'BestellingController@getOrder']);;
Route::delete('admin/bestelling/overzicht/verwijder/{id}', ['as' => 'delete_bestelling', 'uses' => 'BestellingController@verwijderen']);

Route::get('admin/bestelling/wijzig/{id}', ['as' => 'edit_bestelling', 'uses' => 'BestellingController@getEdit']);
Route::post('admin/bestelling/wijzig', ['as' => 'save_bestelling', 'uses' => 'BestellingController@wijzigen']);

Route::get('admin/klant', ['as' => 'klant', 'uses' => 'KlantController@index']);
Route::get('admin/klant/wijzig/{id}', ['as' => 'edit_klant', 'uses' => 'KlantController@getEdit']);
Route::post('admin/klant/wijzig', ['as' => 'save_klant', 'uses' => 'KlantController@klantWijzigen']);
Route::delete('admin/klant/verwijder/{id}', ['as' => 'delete_klant', 'uses' => 'KlantController@klantVerwijderen']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

