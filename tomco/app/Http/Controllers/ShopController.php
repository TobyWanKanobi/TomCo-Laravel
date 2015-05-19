<?php namespace TomCo\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;
use TomCo\models\Categorie;
use Illuminate\Support\Facades\Input;

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
	
	public function search()
	{
		if(Input::has('term')) {
			
			$term = Input::get('term');
			$products = Product::where('naam', 'LIKE', '%'.$term.'%')
			->orWhere('omschrijving_kort', 'LIKE', '%'.$term.'%')
			->orWhere('omschrijving_kort', 'LIKE', '%'.$term.'%')->get();
			
			return view('shop.search-results', ['products' => $products]);
		}
		
		return redirect()->back();
	}
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function product()
	{
	//	$products = Product::all();
	//	$categories = Categorie::wherenull('parent_id')->with('subCategorien')->get();
		
		//return view('pages.browse-products', ['categorien' => $categories, 'products' => $categories->products()->get()]);
		return "Hello World";
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
