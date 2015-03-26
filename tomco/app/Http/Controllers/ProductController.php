<?php namespace TomCo\Http\Controllers;

use TomCo\Http\Requests\ProductFormRequest;
use TomCo\models\Product;
use Input;
use Redirect;
use Illuminate\View\View;

class ProductController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.dashboard');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function overzicht()
	{
		
		$products = Product::all();
		
		return view('admin.overzicht-product', ['products' => $products]);
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function verwijderen($id)
	{
		$deleted=Product::find($id);
		$deleted->delete();
		$products=Product::all();

		return view('admin.overzicht-product', ['products' => $products]);
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function wijzigen(ProductFormRequest $request)
	{
		$product = Product::update($request->all());
		$this->validate($request, ['naam' => 'required']);
		$products=Product::all();
		
		return view('admin.overzicht-product', ['product' => $product]);
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function nieuw()
	{
		
		$product = new Product();
		
		return view('admin.nieuw-product', ['product' => $product]);
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function opslaan(ProductFormRequest $request)
	{
		$product = Product::create($request->all());
		$this->validate($request, ['naam' => 'required']);
		
		return view('admin.nieuw-product', ['product' => $product]);
	}

}