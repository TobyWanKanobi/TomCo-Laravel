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
		$products = Session::get('shopping_cart');
		if($products == null) {
			$items = [];
		}
		
		return view('shop.shopping-cart', ['products' => $products]);
	}
	
	public function addToCart($id, $quantity)
	{
		$product = Product::find($id);
		
		if($product != null) {
			
			$item = [
				'id' => $product->product_id,
				'name' => $product->naam,
				'description' => $product->omschrijving_kort,
				'price' => $product->prijs,
				'image' => $product->afbeelding_klein,
				'quantity' => $quantity,
			];
			
			$cart = Session::get('shopping_cart');
			
			if($cart == null) {
				$cart = [];
			}
			
			if(array_key_exists($product->product_id, $cart)) {
				$cart[$product->product_id] = $item;
				//replace
			
			} else {
				$cart[(string)$product->product_id] = $item;
				//add
			}
		
			Session::put('shopping_cart', $cart);
			var_dump(Session::get('shopping_cart'));
			
		}
		
		return redirect()->route('shopping_cart');
	}
	
	public function removeFromCart($id)
	{
		$cart = Session::get('shopping_cart');
		if($cart) {
			
			if(array_key_exists($id, $cart)) {
				unset($cart[$id]);
				Session::put('shopping_cart', $cart);
			}
			
		}
		
		return redirect()->route('shopping_cart');
	}
	
}
