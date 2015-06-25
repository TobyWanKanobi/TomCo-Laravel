<?php namespace TomCo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use TomCo\models\Customer;
use TomCo\models\Product;
use TomCo\models\Bestelling;
use TomCo\models\Categorie;

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
			$products = [];
		}
		
		return view('shop.shopping-cart', ['products' => $products]);
	}
	
	public function orderSummary()
	{
		$products = Session::get('shopping_cart');
		if($products == null) {
			$products = [];
		}
		
		$customer = Customer::where('account_id', Auth::user()->getAuthIdentifier())->first();
		$date = Carbon::now();
		return view('shop.order-summary', ['products' => $products, 'customer' => $customer, 'date' => $date]);
	}
	
	public function addToCart(Request $request)
	{
		$this->validate($request, ['id' => 'required|integer', 'quantity' => 'required|integer']);
		
		$id = $request->input('id');
		$quantity = $request->input('quantity');
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
	
	public function checkout()
	{
		$cart = Session::get('shopping_cart');
		$besteldeProds = [];
		// Haal waardes die in de koppeltabel moeten komen uit de sessie (winkelmandje)
		if($cart != null)
		{
			foreach($cart as $key => $value)
			{
				$besteldeProds[$key] = ['aantal' => $value['quantity'], 'subtotaal' => $value['quantity'] * $value['price']];
			}
		
		
		$klant = Customer::where('account_id', Auth::user()->getAuthIdentifier())->first();
		$bestelling = new Bestelling;
		$bestelling->klant_id = $klant->klant_id;
		$bestelling->afleveradres_straat = $klant->adres_straat;
		$bestelling->afleveradres_nummer = $klant->adres_nummer;
		$bestelling->afleveradres_toevoeging = $klant->adres_toevoeging;
		$bestelling->afleveradres_postcode = $klant->postcode;
		$bestelling->afleveradres_woonplaats = $klant->woonplaats;
		$bestelling->besteld_op = Carbon::now();
		
		// Maakt transactie, wanneer er iets mis gaat zal bestelling zowel als bestelregel niet toegevoegd worden
		DB::transaction(function() use ($bestelling, $besteldeProds)
		{
			// Voeg bestelling toe
			$bestelling->save();
			
			// Voeg bestelregels toe
			$bestelling->producten()->sync($besteldeProds);
			Session::forget('shopping_cart');
		});
		}
		else {
			return redirect()->route('home');
		}
		
		return view('shop.checkout', ['bestelling' => $bestelling]);
	}
	
}
