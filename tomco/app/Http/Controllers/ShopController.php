<?php namespace TomCo\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use TomCo\models\Product;
use TomCo\models\Categorie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

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
	
	public function shoppingCart()
	{
		$items = Session::get('shopping_cart');
		$ids = [];
		if($items) {

			foreach($items as $item) {
			
				array_push($ids, $item['id']);
			}
		
		}
		
		$products = Product::whereIn('product_id', $ids)->get();
		
		return view('shop.shopping-cart', ['products' => $products]);
	}
	
	public function addToCart($id)
	{
		$product = Product::find($id);
		
		
		if($product != null) {
			
			$cart = Session::get('shopping_cart');
			$isOnCard = false;
			if($cart) { // Lege array wordt automatisch omgezet naar boolean false
			
				foreach($cart as $item) {
					
					if($item['id'] == $id) {
					
						echo 'Product in array';
						$isOnCard = true;
					}
		
				}
			}
			
			if(!$isOnCard) {
				Session::push('shopping_cart', ['id' => $id, 'quantity' => 1]);
			}
			
		}
		
		print_r(Session::all());
		
		return response('hallo');
	}
	
	public function removeFromCart($id)
	{
		$cart = Session::get('shopping_cart');
		$isOnCard = false;
		if($cart) { // Lege array wordt automatisch omgezet naar boolean false
			
			foreach($cart as $key => $item) {
					
				if($item['id'] == $id) {
					unset($cart[$key]);
					$isOnCard = true;
					Session::put('shopping_cart', $cart);
		
				}
			}
			
			
		}
		
		return response('hallo');
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
