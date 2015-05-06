<?php namespace TomCo\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;

class ShopController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Shop Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
		//$this->middleware('auth');
	}
	
	public function index()
	{
		$products = Product::all();
		
		return view('pages.browse-products', ['products' => $products]);
	}
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function product()
	{
		$products = Product::all();
		$categories = Categorie::all();
		
		return view('pages.browse-products', ['categorien' => $cats, 'products' => $products]);
	}
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	/*public function product()
	{
		$products = Product::all();
		
		return view('pages.product-detail', ['products' => $products]);
	}*/

}
